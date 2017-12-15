# Lumen Messenger Sdk

[![Build Status](https://travis-ci.org/hungneox/lumen-messenger-sdk.svg?branch=master)](https://travis-ci.org/hungneox/lumen-messenger-sdk)
[![Coverage Status](https://coveralls.io/repos/github/hungneox/lumen-messenger-sdk/badge.svg?branch=master)](https://coveralls.io/github/hungneox/lumen-messenger-sdk?branch=master)
[![StyleCI](https://styleci.io/repos/114259544/shield?style=flat)](https://styleci.io/repos/114259544)

Lumen/Laravel package for developing facebook messenger chat bot

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
                        (new UrlButton())
                            ->setUrl('https://en.wikipedia.org/wiki/Rickrolling')
                            ->setTitle('View More')
                    )
            )->setRecipientId($sender);

```
