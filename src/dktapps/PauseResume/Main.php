<?php

namespace dktapps\PauseResume;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;

class Main extends PluginBase{

	public function onEnable(){
		$this->getLogger()->info("Hello World!");
	}

	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "pause":
				$pk = new \pocketmine\network\mcpe\protocol\LevelEventPacket();
				$pk->evid = 3005;
				$pk->data = 1;
				$sender->getServer()->broadcastPacket($sender->getServer()->getOnlinePlayers(), $pk);
				$sender->sendMessage("Paused!");
				return true;
			case "resume":
				$pk = new \pocketmine\network\mcpe\protocol\LevelEventPacket();
				$pk->evid = 3005;
				$pk->data = 0;
				$sender->getServer()->broadcastPacket($sender->getServer()->getOnlinePlayers(), $pk);
				$sender->sendMessage("Resumed!");
				return true;
			default:
				return false;
		}
	}

	public function onDisable(){
		$this->getLogger()->info("Bye");
	}
}