<?php
namespace App\Controller;

use Aternos\Codex\Log\File\PathLogFile;
use Aternos\Codex\Minecraft\Detective\Detective;
use Aternos\Codex\Minecraft\Log\VanillaLog;
use Aternos\Codex\Printer\DefaultPrinter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MinecraftController {

  /**
   * @Route("/mc/{version}/{number}")
   *
   */
  public function landing($version = '', $number = NULL) {

    $body = "";


    switch ($version) {
      //Bedrock Edition
      case 'be':
        $file_path = "/home/server/Minecraft/Minecraft_";
      case 'java':
        $file_path = "/home/server/Minecraft/Minecraft_Java_wPlugins/logs/latest.log";
        break;
      default:
        $file_path = "/home/server/Minecraft/Minecraft_Java_wPlugins/logs/latest.log";
    }
    $logFile = new PathLogFile("../minecraft_logs/latest.log");

    //    $log = new VanillaLog();
    //    $log->setLogFile($logFile);

    $detective = new Detective();
    $detective->setLogFile($logFile);
    $log = $detective->detect();



    $log->parse();

    $entries = $log->getEntries();
    if (is_numeric($number)) {
      $entries = array_slice($entries, -$number);
    }
    foreach ($entries as $entry) {
      $body .= "<br/>";
      $body .= $entry;
    }

    return new Response($body);

  }
}