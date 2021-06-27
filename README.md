# php-riot-games-api
PHP Wrapper for Riot Games API

## Usage

### GameConstant

```php
use Ta9to\RiotGamesApi\GameConstant;

echo GameConstant::seasons();
// [{"id": 0, "season": "PRESEASON 3"}, {"id": 1, "season": "SEASON 3"}, ...
```

### DataDragon

```php
use Ta9to\RiotGamesApi\DataDragon;

echo DataDragon::versions();
// ["11.13.1","11.12.1","11.11.1","11.10.1","11.9.1","11.8.1","11.7.1","11.6.1"...

echo DataDragon::champion('11.13.1', 'en_US');
// {"type":"champion","format":"standAloneComplex","version":"11.13.1","data":{"Aatrox"...
```

## Todo

- get champion detail (http://ddragon.leagueoflegends.com/cdn/11.13.1/data/en_US/champion/Aatrox.json)
- resolve image path
- call api with token
