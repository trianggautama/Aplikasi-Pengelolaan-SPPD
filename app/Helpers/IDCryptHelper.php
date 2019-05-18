<?php

namespace App\Helpers;

use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class IDCryptHelper
{
  public static function Encrypt($Id)
  {
    return Crypt::encryptString($Id);
  }

  public static function Decrypt($Id)
  {
    try {
      return Crypt::decryptString($Id);
    } catch (DecryptException $e) {
      return abort('404');
    }
  }
}
