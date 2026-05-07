# GridStack Testproject

Dit is een technisch testproject om de GridStack implementatie te onderzoeken en te testen met dynamische layouts.

---

## Installatie en starten

### 1. Project uitpakken
Unzip het projectbestand en open deze in een code editor.

### 2. Dependencies installeren

Ga naar de root van het project en voer de volgende commands uit in de terminal:

#### PHP dependencies (Laravel)
```bash
composer install
```

Stel de database op:
```bash
php artisan migrate:fresh --seed
```

Deze command geeft een lokale url terug waarmee de website geopend kan worden:
```bash
php artisan serve
```

Open een nieuwe terminal (sluit de vorige terminal niet) en voer dit command uit:
```bash
npm run dev
```


## Belangrijke routes

### `/`
Startscherm voor het aanmaken van een nieuwe layout.

### `/index`
Overzichtspagina met alle gemaakte layouts.

### `/load/(id)`
Weergave van een opgeslagen layout op desktop.

### `/edit/(id)`
Bewerken van een layout.

### `/load-app/(id)`
Mobiele weergave van een opgeslagen layout (telefoonweergave).  
Deze route is niet via de interface bereikbaar en kan alleen handmatig via de URL worden geopend.
