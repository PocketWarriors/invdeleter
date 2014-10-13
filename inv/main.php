<?php


namespace SkyWars;

use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityLevelChangeEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\EventExecutor;
use pocketmine\event\EventPriority;
use pocketmine\event\Listener;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\scheduler\PluginTask;



class SkyWars extends PluginBase implements Listener{
	
public $isworldswitched = false;
public $config;
//public $bplayers;
//public $cplayers;

	public function onEnable(){
		$this->getServer()->getPluginManager->registerEvents($this, $this); 
        	$this->getLogger()->info(TextFormat::DARK_RED . "Inv" . TextFormat::DARK_BLUE . "deleter" . TextFormat::AQUA . "plugin by PocketWarriors is loading...");
        	$this->config = new Config($this->getDataFolder()."INVDELETER", Config::YAML, array(
        	"Delete-inventory-on-world-switch" => true,
          "Allow_op_to_use_/deleteinv_<player>" => true,
            	$this->config->save();
            
	}

	public function onDisable(){
        	$this->getLogger()->info(TextFormat::GOLD . "INVDELETER plugin by PocketWarriors is disabling...");
        	$this->config->save();
        }
	
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		switch($cmd->getName()){
			case "deleteinv":
        			if($sender->hasPermission("deleteinv.command") {
               $check = $this->config->get("Allow_op_to_use_/deleteinv"){
               $goodtogo = if($sender->isOp and if($this->check = true); 
               $name = $this->player->getName()->getInv();
               if($goodtogo = true; $this->player->setInv(0);
                return true;
    	          }
	               else{
	            $sender->sendMessage("Something went wrong make sure player exists and youre op with permission to do this command.");
	               }
	            return false;     
					           }
					        }
				}
		}
	}
	
	public function onLevelChange(EntityLevelChangeEvent $event){
    $check1 = $this->config->get("Delete-inventory-on-world-switch" => true,){
    $goodtogo1 = this->check1 = true;
    if($goodtogo1 = true; $entity->getName()->getInv();
    $entity->setInv(0);
     return true;
      }else{
     return false;
  				}
		}
	}
