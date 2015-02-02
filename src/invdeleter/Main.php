<?php

namespace invdeleter;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;
use pocketmine\event\entity\EntityLevelChangeEvent;

use pocketmine\inventory\BaseInventory;

use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;


class Main extends PluginBase implements Listener{
	
private $prefs;

	public function onEnable(){
		$this->getServer()->getPluginManager->registerEvents($this, $this); 
        	$this->getLogger()->info(TextFormat::DARK_RED . "Inv" . TextFormat::DARK_BLUE . "deleter" . TextFormat::AQUA . "plugin by PocketWarriors is loading...");
        	@mkdir($this->getDataFolder());
        	$this->prefs = new Config($this->getDataFolder()."preferences.yml", Config::YAML, array("Delete-inventory-on-world-switch" => true));
            	$this->prefs->save();
	}

	public function onDisable(){
        	$this->getLogger()->info(TextFormat::GOLD . "INVDELETER plugin by PocketWarriors is disabling...");
        	$this->prefs->save();
        }
	
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "deleteinv":
        			if($sender->hasPermission("deleteinv.command") {
        				if(!isset($args[0])){
        					return false;
        				}
        				$user = $this->getServer()->getPlayer($args[0]);
        				if($user !== null and $user->isOnline()){
        					$user->getInventory()->clearAll();
        					$sender->sendMessage($user."'s inventory has been deleted.");
        					return true;
        				}else{
        					$sender->sendMessage($user." is not online.");
        					return true;
        				}
        			}
        		break;
        		
        		default:
        			return false;
		}
	}
	
	public function onLevelChange(EntityLevelChangeEvent $event){
		if($event->getEntity() instanceof Player){
			if($this->prefs->get("Delete-inventory-on-world-switch") == true){
				$event->getEntity()->getInventory()->clearAll();
			}
		}
	}
}
