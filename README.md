To do:

Tu je tvoj To-Do list (technický roadmap), ako ten StackFood skrotiť, zmenšiť a pripraviť na produkciu na Railway. Postupuj presne v tomto poradí:

📋 StackFood Deployment To-Do List
Vyčistenie repozitára (Anti-Bordel operácia)

Vytvoriť .dockerignore a zakázať v ňom .git, node_modules, Documentation/ a Installation_Step_Images/.

Manuálne vymazať všetky nepoužívané SQL dumpy alebo demo videá, ktoré autori pribalili.

Implementácia Viacfázového (Multi-stage) Dockeru

Fáza 1 (Node builder): Skompilovať React/Next frontend a vygenerovať produkčné assety (JS/CSS).

Fáza 2 (PHP/Composer builder): Stiahnuť len produkčné závislosti (--no-dev) a optimalizovať autoloader.

Fáza 3 (Final Runtime): Použiť čistý PHP-Apache image, skopírovať len výsledky z predošlých fáz a nastaviť práva pre storage a cache.

Konfigurácia Apache & Laravel Entrypointu

Presmerovať DocumentRoot v Dockerfile priamo do priečinka /public.

Povoliť mod_rewrite v Apache (inak ti pôjde len úvodná stránka a ostatné vyhodia 404).

Externé Úložisko (Persistent Storage)

Zriadiť AWS S3 bucket alebo Cloudinary konto.

V admin paneli StackFood prepnúť File Storage z "Local" na tvoju cloudovú službu (inak po každom redeploy stratíš fotky jedál).

Nastavenie Environment Variables v Railway

Nahádzať všetky citlivé údaje (DB_HOST, DB_PASSWORD, APP_KEY) priamo do Railway Dashboardu.

Nepúšťať web installer opakovane – radšej mu podstrčiť hotový .env cez premenné.

Automatizácia Cron Jobu

V Railway vytvoriť samostatnú "Service" alebo použiť externý pinger, ktorý bude každú minútu volať php artisan schedule:run. Bez toho nebudú chodiť maily ani expirácie objednávok.

Firebase & Push Notifikácie

Vygenerovať service-account.json vo Firebase konzole.

Nahrať ho do projektu (alebo vložiť obsah do env premennej), aby reštauráciám reálne pípali objednávky na mobiloch.

Monitoring Zdrojov

Nastaviť v Railway limit RAM na minimálne 1GB.

Sledovať logy počas prvých 10 objednávok, či ten "indický JS" nespôsobuje memory leaky v prehliadači klienta.
