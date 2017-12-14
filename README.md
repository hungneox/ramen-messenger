# Lumen Messenger Sdk

Lumen/Laravel package for develop facebook messenger chat bot

[![Build Status](https://travis-ci.org/hungneox/lumen-messenger-sdk.svg?branch=master)](https://travis-ci.org/hungneox/lumen-messenger-sdk)

# Usage

## Working with templates

### Open graph template

![Open graph template](https://scontent-arn2-1.xx.fbcdn.net/v/t39.2365-6/23423203_163011880970306_7772330384011821056_n.png?oh=07b61b7ebf876cccf501cb57c066a9c4&oe=5ACEC2FE)
```php
return (new OpenGraphTemplate())
            ->addElement(
                (new OpenGraphElement())
                    ->setUrl('https://open.spotify.com/track/7GhIk7Il098yCjg4BQjzvb')
                    ->addButton(
                        (new WebUrlButton())
                            ->setUrl('https://en.wikipedia.org/wiki/Rickrolling')
                            ->setTitle('View More')
                    )
            )->setRecipientId($sender);

```
