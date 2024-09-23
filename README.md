### Instructions

#### With reversebox and docker
- Install reversebox on wsl https://github.com/hunwalk/reversebox
- Add `alias symfony='~/.local/bin/php.sh symfony'` to `~/.bash_aliases` to access symfony command from active container directory
- Add `contacts.local` and `pma.contacts.local` to `/etc/hosts` or `C:/Windows/System32/drivers/etc/hosts` ( inspect proxynet network for ip )
- `cp .env.example .env`
- `docker compose up -d`
- `composer install` (optional, not entirely sure if serversideup's image contains the composer install, probably not)

#### Without reversebox and docker
- `cp .env.example .env`
- Open ports for app in `compose.yaml`
- `docker compose up -d`
- `docker exec -it contacts_dev_app composer install` (optional, not entirely sure if serversideup's image contains the composer install, probably not)
