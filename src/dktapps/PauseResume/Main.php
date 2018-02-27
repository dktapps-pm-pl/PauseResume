<?php

namespace dktapps\PauseResume;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\network\mcpe\protocol\LevelEventPacket;

class Main extends PluginBase{

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
		switch($command->getName()){
			case "pause":
				$pk = new LevelEventPacket();
				$pk->evid = LevelEventPacket::EVENT_PAUSE_GAME;
				$pk->data = 1;
				$sender->getServer()->broadcastPacket($sender->getServer()->getOnlinePlayers(), $pk);
				$sender->sendMessage("Paused!");
				return true;
			case "resume":
				$pk = new LevelEventPacket();
				$pk->evid = LevelEventPacket::EVENT_PAUSE_GAME;
				$pk->data = 0;
				$sender->getServer()->broadcastPacket($sender->getServer()->getOnlinePlayers(), $pk);
				$sender->sendMessage("Resumed!");
				return true;
			default:
				return false;
		}
	}
}
