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


    /**
     * @param CommandEvent $event
     * @priority LOWEST
     */
    public function onCommandExecute(CommandEvent $event) {
        $message = $event->getCommand();
        $commandLine = explode(" ", trim($message));
        $commandLine[0] = preg_replace(['/"/', "/:/"], "", $commandLine[0]);
        $event->setCommand(implode(" ", $commandLine));
    }
}