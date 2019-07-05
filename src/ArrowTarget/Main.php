<?php
namespace ArrowTarget;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\entity\ProjectileHitBlockEvent;
use pocketmine\event\entity\EntityShootBowEvent;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as C;

class Main extends PluginBase implements Listener{
    
    public $player;
    public $entity;
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
    }
    
	
	public function onShoot(EntityShootBowEvent $e){
	$prjctle = $e->getProjectile();
	$shooter = $prjctle->getOwningEntity();
	if($shooter instanceOf Player){
	$this->player = $shooter;
	}
	}
	
	
	public function onHitBlock(ProjectileHitBlockEvent $e){
	$block = $e->getBlockHit();
	$id = $block->getId();
	$meta = $block->getDamage();
	$Iblock = $id.":".$meta;
	$bname = Item::get($id,$meta,0)->getName();
	
if($this->player == null) return true;
	
	switch ($Iblock){
	    
	    case "35:14": //Red
	   $this->player->sendMessage(C::YELLOW.C::UNDERLINE."You Hit ".C::RED.C::UNDERLINE.$bname);
	        break;
	        
	    case "35:5": //Lime
	   $this->player->sendMessage(C::YELLOW.C::UNDERLINE."You Hit ".C::GREEN.C::UNDERLINE.$bname);   
	        break;
	        
	    case "35:0": // White
	   $this->player->sendMessage(C::YELLOW.C::UNDERLINE."You Hit ".C::WHITE.C::UNDERLINE.$bname);    
	        break;
	        
	    case "35:15": //Black
	   $this->player->sendMessage(C::YELLOW.C::UNDERLINE."You Hit ".C::BLACK.C::UNDERLINE.$bname);
	        break;
	}

   
	
	}
    
    public function onDisable(){
     $this->getLogger()->info("§cOffline");
    }
}
