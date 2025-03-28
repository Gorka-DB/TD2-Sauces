
# TD2-Sauces

R4.01 - Architecture logicielle (LARAVEL)
# /!\ ATTENTION /!\
Les sauces créées dans la base de données via les seeders sont associées à un utilisateur créé de façon aléatoire.

La modification des sauces étant conditionnée à la "propriété" de celles-ci ( il faut que la sauce ait un userId associé à l'utilisateur connecté ), il est fortement conseillé de :
- soit créer un nouveau compte en s'inscrivant, puis remplacer en bd les userId de sauces à modifier par celui du nouvel utilisateur
- soit remplacer le hash du mot de passe de l'utilisateur de test par défaut dont les identifiants sont en base de données, par le hash d'un nouveau mot de passe

Deux branches sont disponibles sur le projet : 
- une branche main avec le site de base
- une branche api avec le modifications nécessaires à la transformation de celui-ci en api

Les tests API avec postman sont également disponibles dans les fichiers de la branche API, libre à vous de les modifier.

## Executer en local

- Cloner le projet

```bash
  git clone https://github.com/Gorka-DB/ProjetCD
```
- Installer les dépendances
```bash
npm install
```

- Configurer le fichier d'environnement .env

- Démarrer WAMP / LAMP


- Créer la base de données en utilisant les migrations et les seeders
```bash
php artisan migrate:fresh
php artisan db:seed DatabaseSeeder
php artisan db:seed SauceSeeder
```
- démarrer Vite
```bash
npm run dev
```
- lancer le serveur web
```bash
php artisan serve
```

## API

#### Récupérer toutes les sauces

```http
  GET /api/sauces
```


#### Récupérer une sauce

```http
  GET /api/sauces/{id}
```

| Parametre | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Requis**. Id de la sauce à récupérer |

#### Modifier une sauce

```http
  PUT /api/sauces/{id}
```

| Parametre | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Requis**. Id de la sauce à modifier |

Payload JSON à faire passer avec les informations des changements de la sauce, voir postman

#### Insérer une sauce

```http
  POST /api/sauces
```
Payload JSON à faire passer avec les informations des changements de la sauce, voir postman

#### Supprimer une sauce

```http
  PUT /api/sauces/{id}
```

| Parametre | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Requis**. Id de la sauce à supprimer |

## Auteurs
- [@gorka-db](https://github.com/Gorka-DB) - Gorka DALMAYRAC--BELASCAIN


