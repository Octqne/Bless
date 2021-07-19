<?php

namespace Zqko;


use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginManager;
use pocketmine\Player;

class Zqko extends PluginBase implements Listener
{
    public function onEnable()
    {
        $this->getLogger()->info("Bless Enabled");
        $this->registerEvents();


    }

    public function registerEvents()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        if (strtolower($command->getName()) == "bless") {
            if ($sender->hasPermission("bless.cmd")) {
                foreach ($sender->getEffects() as $effect) {
                    if ($effect->getType()->isBad()) {
                        $sender->removeEffect($effect->getId());
                        $sender->sendMessage("§r§b§rBlessed§r§b§l");
                    }elseif(!$sender->hasPermission("bless.cmd")){
                        $sender->sendMessage(" You do not have permission to run this command");                 


                    }
                }
            }
        }
return true;
    }
}
