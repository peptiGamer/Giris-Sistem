<?php

/*
* _  _____             _        ______
* (_)/ ____|           | |      |___  /
*  _| (___  _ __   ___ | | _____   / /
* | |\___ \| '_ \ / _ \| |/ / _ \ / /
* | |____) | |_) | (_) |   <  __// /__
* |_|_____/| .__/ \___/|_|\_\___/_____|
*          | |
*          |_|
*
*@author iSpokeZ (Umut Yıldırım)
*
*@RainzGG Tüm Hakları Saklıdır!
*
*@Eklenti Umut Yıldırım Tarafından Özel Olarak Kodlanmıştır. Dağıtılması Kesinlikle Yasaktır!
*
*@YouTube - iSpokeZ
*
*/

namespace iSpokeZ;

use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;
use pocketmine\math\Vector3;
use pocketmine\Server;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\TextFormat as C;
use pocketmine\level\particle\HeartParticle;
use pocketmine\level\sound\BlazeShootSound;
use pocketmine\event\Listener;

class Login extends PluginBase implements Listener {

    public function onEnable(){
        $this->getLogger()->info("§7> §aAktif");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onDisable(){
        $this->getLogger()->info("§7> §cDe-Aktif");
    }

    public function Giris(PlayerJoinEvent $e){
        $o = $e->getPlayer();
        $isim = $o->getName();
        $o->sendMessage(C::RED . "Sunucuya Hoşgeldin" . C::GOLD . " $isim");
        $o->getLevel()->addSound(new BlazeShootSound($o));
        $o->getLevel()->addParticle(new HeartParticle($o));
        $e->setJoinMessage(C::AQUA . "" . $isim . C::GRAY . " Sunucuya Katıldı");
        $this->girisForm($o);
    }

    public function girisForm($o){
        $form = $this->getServer()->getPluginManager()->getPlugin("FormAPI")->createSimpleForm(function(Player $o, array $data){
            $result = $data;
            if($result === null){
                return true;
            }
            switch($result){
                case 0:
                    break;
            }
        });
        $form->setTitle(C::AQUA . "Giriş Menüsü");
        $form->setContent(C::GOLD . "
Sunucuya Hoşgeldin :)
Giriş Yazısı.
Plugin By iSpokeZ
");
        $form->addButton(C::RED . "Tamam");
        $form->sendToPlayer($o);
    }
}