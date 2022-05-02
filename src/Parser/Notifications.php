<?php

namespace App\Parser;


use JetBrains\PhpStorm\Pure;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Filesystem\Filesystem;
use Telegram\Bot\Api as ApiTelegram;

class Notifications
{
    private Api $api;
    private ApiTelegram $bot;

    public function __construct(
        Api                    $api,
        ApiTelegram                    $bot,
    )
    {
        $this->api = $api;
        $this->bot = $bot;
    }

    public function handle():void
    {
        if (!file_exists(__DIR__ . '/../../var/current.txt')) {
            file_put_contents(__DIR__ . '/../../var/current.txt', '');
        }

        while (true) {
            $crawler = new Crawler($this->api->request(), 'https://expo.chikoroko.art/');
            $current = file_get_contents(__DIR__ . '/../../var/current.txt');

            if ($dom = $crawler->filter('body > a')->first()) {
                if ($current != $dom->filter('.data-block__container')->link()->getNode()->getAttribute('href')) {

                    $url = $dom->link()->getUri();
                    $date = $dom->filter('.data-block__info')->filter('.p1')->text();
                    $title = $dom->filter('.data-block__info')->filter('.text')->text();

                    $text = $date . "\n";
                    $text .= '<a href="' . $url . '">' . $title . '</a>';

                    $this->bot->sendMessage([
                        'chat_id' => '@expoidea',
                        'text' => $text,
                        'parse_mode' => 'HTML',
                        'disable_web_page_preview' => true
                    ]);

                    file_put_contents(__DIR__ . '/../../var/current.txt', $dom->filter('.data-block__container')->link()->getNode()->getAttribute('href'));

                } else dump('Нет отправки');

                sleep(600);
            }
        }
    }
}
