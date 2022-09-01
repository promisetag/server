<?php

namespace App\Http\Controllers;

use App\Http\Resources\VaultResource;
use App\Models\Vault;
use App\Services\QRCodeGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GetVaultController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $newVault = $request
            ->user()
            ->vaults()
            ->where("status", "new")
            ->first();

        if ($newVault) {
            return new VaultResource($newVault);
        }

        $newVault = Vault::create([
            "user_id" => $request->user()->id,
            "storage_space_allotted" => 120,
            "storage_space_used" => 0,
            "status" => "new",
        ]);

        $data = route("vaults.show", ["vault" => $newVault->id]);

        $qrImagePath = storage_path(sprintf("app/%s.png", Str::random(12)));

        (new QRCodeGenerator())->generate($data, $qrImagePath);

        $newVault->addMedia($qrImagePath)->toMediaCollection("qr code");

        return new VaultResource($newVault);
    }
}
