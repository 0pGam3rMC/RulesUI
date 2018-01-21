<?php

namespace RulesUI;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as TF;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;

class Main extends PluginBase implements Listener {
	
    public function onEnable() {
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		if($api === null){
			$this->getServer()->getPluginManager()->disablePlugin($this);			
		}
    }
	
    public function onCommand(CommandSender $sender, Command $cmd, string $label,array $args) : bool {
		switch($cmd->getName()){
			case "core":
				if($sender instanceof Player) {
					$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
					$form = $api->createSimpleForm(function (Player $sender, array $data){
					$result = $data[0];
					
					if($result === null){
						return true;
					}
						switch($result){
							case 1:
								$this->infomenu($sender);
							case 2:
								$this->owner($sender)
						   
						}
					});
					$form->setTitle(TF::GREEN . "-=-SkyRealmPE Main Menu -=-");
					$form->setContent("To Learn about any of this servers features look below \n");
					$form->addButton("Info", 1);
					$form->addButton("owner", 2);
					$form->sendToPlayer($sender);
				}
				else{
					$sender->sendMessage(TextFormat::RED . "Use this Command in-game.");
					return true;
				}
			break;
		}
		return true;
    }
  public function infomenu($sender){
	  $form->setTitle("SkyRealmPE Info");
	  $form->setContent("Hey there! This is the info for this server"):
  } 
  public function owner($sender){
      $form->setTitle("Owner of this server");
      $form->setContent("Crafter@0162017 this the owner here");
  
  }
	
}
