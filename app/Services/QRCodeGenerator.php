<?php

namespace App\Services;

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class QRCodeGenerator {

  public function generate(string $data, string $path)
  {

        $options = new QROptions([
            "version" => 7,
            "outputType" => QRCode::OUTPUT_IMAGE_PNG,
            "scale" => 10,
            "imageBase64" => false,
            "imageTransparent" => false,
            "drawCircularModules" => true,
            "circleRadius" => 0.4,
        ]);

        (new QRCode($options))->render($data, $path);
  }
  
}
