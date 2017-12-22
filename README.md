# Ramen Messenger

[![Build Status](https://travis-ci.org/hungneox/ramen-messenger.svg?branch=master)](https://travis-ci.org/hungneox/ramen-messenger)
[![Coverage Status](https://coveralls.io/repos/github/hungneox/ramen-messenger/badge.svg?branch=master)](https://coveralls.io/github/hungneox/ramen-messenger?branch=master)
[![StyleCI](https://styleci.io/repos/114259544/shield?style=flat)](https://styleci.io/repos/114259544)

A La**ra**vel/Lu**men** package for developing facebook messenger chat bot

# Usage
## Messenger Service

```php
/** @var MessengerService $bot */
$bot = app(MessengerService::class);

$bot->hears('Hello', function(MessengerService $bot) {
    $bot->replies('Greeting from the bot!');
});
```

## Working with templates

### Text template

#### Quick replies

![Quick replies](https://scontent-arn2-1.xx.fbcdn.net/v/t39.2365-6/14235551_1274248235927465_1935714581_n.png?oh=a84b83c9e0c5a1de7cb921c516240448&oe=5ABCBA90)

```php
return (new TextTemplate($sender, 'Please share your location'))
            ->addQuickReply(
                (new QuickReply())->setContentType('location')
            );
```

### Button template

![Button template](https://scontent.fhel1-1.fna.fbcdn.net/v/t39.2365-6/23204276_131607050888932_1057585862134464512_n.png?oh=ec127f3527146478fe2039b37aaf44f7&oe=5ACADA0A)

```php
return (new ButtonTemplate())
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

### Open graph template

![Open graph template](https://scontent-arn2-1.xx.fbcdn.net/v/t39.2365-6/23423203_163011880970306_7772330384011821056_n.png?oh=07b61b7ebf876cccf501cb57c066a9c4&oe=5ACEC2FE)
```php
return (new OpenGraphTemplate())
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

```

# License

See [LICENSE](LICENSE)
