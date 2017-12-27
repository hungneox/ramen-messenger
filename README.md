# Ramen Messenger

[![Build Status](https://travis-ci.org/hungneox/ramen-messenger.svg?branch=master)](https://travis-ci.org/hungneox/ramen-messenger)
[![Coverage Status](https://coveralls.io/repos/github/hungneox/ramen-messenger/badge.svg?branch=master)](https://coveralls.io/github/hungneox/ramen-messenger?branch=master)
[![StyleCI](https://styleci.io/repos/114259544/shield?style=flat)](https://styleci.io/repos/114259544)
[![Latest Unstable Version](https://poser.pugx.org/hungneox/ramen-messenger/v/unstable)](https://packagist.org/packages/hungneox/ramen-messenger)
[![Total Downloads](https://poser.pugx.org/hungneox/ramen-messenger/downloads)](https://packagist.org/packages/hungneox/ramen-messenger)
[![License](https://poser.pugx.org/hungneox/ramen-messenger/license)](https://packagist.org/packages/hungneox/ramen-messenger)

A La**ra**vel/Lu**men** package for developing facebook messenger chat bot

# Usage

## Installation
Run the following command to install the package through Composer:

```
composer require composer require hungneox/ramen-messenger
```
Add these environment variables to your .env

```
FACEBOOK_PAGE_ID=<YOUR_FACEBOOK_PAGE_ID>
FACEBOOK_VERIFY_TOKEN=<TOKEN_FOR_VERIFY_YOUR_BOT>
FACEBOOK_ACCESS_TOKEN=<YOUR_FACEBOOK_PAGE_ACCESS_TOKEN>
```

Copy the configuration template in config/facebook.php to your application's config directory and modify it to suit your needs.

Add the following line to bootstrap/app.php:

```php
$app->register(\Neox\Ramen\Messenger\MessengerServiceProvider::class);
```

To [configure the webhook](https://developers.facebook.com/docs/messenger-platform/getting-started/app-setup) for your app, adding a route for facebook verification

```php
$router->get('/webhook', [
    'as'   => 'webhook.index',
    'uses' => 'WebHookController@index'
]);
```

```php
/**
 * For facebook verification
 *
 * @param Request $request
 */
public function index(Request $request)
{
    if ($request->get('hub_verify_token') === config('facebook.verify_token')) {
        return $request->get('hub_challenge');
    }

    return 'Wrong verification token!';
}
```

## Messenger Service

```php
/** @var RamenBot $bot */
$bot = app(RamenBot::class);
$bot->hears('hello', function(RamenBot $bot) {
    $bot->replies('greeting from the bot!');
});
```

## Working with templates

### Text template

#### Quick replies

![Quick replies](https://scontent-arn2-1.xx.fbcdn.net/v/t39.2365-6/14235551_1274248235927465_1935714581_n.png?oh=a84b83c9e0c5a1de7cb921c516240448&oe=5ABCBA90)

```php
$template = (new TextTemplate($sender, 'Please share your location'))
            ->addQuickReply(
                (new QuickReply())->setContentType('location')
            );
```

### Button template

![Button template](https://scontent.fhel1-1.fna.fbcdn.net/v/t39.2365-6/23204276_131607050888932_1057585862134464512_n.png?oh=ec127f3527146478fe2039b37aaf44f7&oe=5ACADA0A)

```php
$template = (new ButtonTemplate())
                ->setRecipientId($sender)
                ->setText('What do you want to do next?')
                ->addButton(
                    (new UrlButton())
                        ->setUrl('https://www.messenger.com')
                        ->setTitle('Get Order Status')
                )->addButton(
                    (new UrlButton())
                        ->setUrl('https://www.messenger.com')
                        ->setTitle('Call Me')
                );
```

```php
// Reply the button template when the bot hears `help`
/** @var RamenBot $bot */
$bot = app(RamenBot::class);
$bot->hears('help', function(RamenBot $bot) use ($template) {
    $bot->sends($template);
});
```

### Open graph template

![Open graph template](https://scontent-arn2-1.xx.fbcdn.net/v/t39.2365-6/23423203_163011880970306_7772330384011821056_n.png?oh=07b61b7ebf876cccf501cb57c066a9c4&oe=5ACEC2FE)
```php
$tempalte = (new OpenGraphTemplate())
            ->addElement(
                (new OpenGraphElement())
                    ->setUrl('https://open.spotify.com/track/7GhIk7Il098yCjg4BQjzvb')
                    ->addButton(
                        (new UrlButton())
                            ->setUrl('https://en.wikipedia.org/wiki/Rickrolling')
                            ->setTitle('View More')
                    )
            )->setRecipientId($sender);

```

## Creating Persistent Menu

![Persistent Menu](https://scontent.fhel1-1.fna.fbcdn.net/v/t39.2365-6/16686128_804279846389859_443648268883197952_n.png?oh=9f7df133cc9b64ce6411aa727c847495&oe=5AC251D6)
```php
// Implements the getMenu() method from SetPersistentMenuCommand abstract class
public function getMenu() {
    return (new PersistentMenu())
               ->addMenu(
                   (new Menu())->addItem(
                       (new Menu())
                           ->setType('nested')
                           ->setTitle('My Account')
                           ->addItem(
                               (new PostBackButton())
                                    ->setTitle('Pay Bill')
                                    ->setPayload('PAYBILL_PAYLOAD')
                           )->addItem(
                               (new PostBackButton())
                                    ->setTitle('History')
                                    ->setPayload('HISTORY_PAYLOAD')
                           )->addItem(
                               (new PostBackButton())
                                    ->setTitle('Contact Info')
                                    ->setPayload('CONTACT_INFO_PAYLOAD')
                           )
                   )->addItem(
                       (new UrlButton())
                            ->setTitle('Latest News')
                            ->setUrl('https://yle.fi/uutiset/osasto/news/')
                   )
               )->addMenu(
                   (new Menu())->addItem(
                       (new UrlButton())
                            ->setTitle('Latest News FI')
                            ->setUrl('https://yle.fi/uutiset')
                   )->setLocale('fi_FI')
               );
}
```

# License

See [LICENSE](LICENSE)
