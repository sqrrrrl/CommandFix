<?php

declare(strict_types=1);

namespace sqrrl\CommandFix;

use pocketmine\event\Listener;
use pocketmine\event\server\CommandEvent;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {

    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onCommandExecute(CommandEvent $event) {
        $message = $event->getCommand();
        $commandLine = explode(" ", trim($message));
        str_replace("\"", "", $commandLine[0]);
        $event->setCommand(implode(" ", $commandLine));
    }
}