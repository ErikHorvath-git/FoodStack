# StackFood V8 Docker Setup

This setup runs:
- Laravel backend (`Main panels- user app and web`)
- Nginx for backend public entrypoint
- MySQL
- Redis
- Queue worker + scheduler
- React web (`StackFood React`)
- Mailhog (SMTP testing)

## 1. Start all services

```bash
docker compose up -d --build
```

## 2. URLs

- Backend (Laravel via Nginx): `http://localhost:8080`
- React web: `http://localhost:3000`
- Mailhog UI: `http://localhost:8025`
- MySQL exposed on host: `127.0.0.1:3307`

## 3. Useful commands

```bash
# logs
docker compose logs -f app
docker compose logs -f stackfood-react

# artisan inside container
docker compose exec app php artisan migrate --force
docker compose exec app php artisan optimize:clear

# npm build for Laravel admin assets (if needed)
docker compose exec app sh -lc "npm install && npm run prod"
```

## 4. Notes

- Backend env for Docker is in:
  - `Main panels- user app and web/.env.docker`
- First start auto-runs migrations in `app` service (`RUN_MIGRATIONS=true`).
- Worker and scheduler are separate containers.
- Flutter mobile apps (`Delivery man app`, `Restaurant app`, `User app and web`) are not runtime-containerized here, because iOS/Android builds are typically done with native toolchains.

## 5. Stop

```bash
docker compose down
```

To remove volumes too:

```bash
docker compose down -v
```
