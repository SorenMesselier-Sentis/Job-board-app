# Job Board App

Ce projet est un petit Dashboard fait avec Laravel qui recense des offres d'emplois avec différents filtres.
<hr>

## Installation du projet

Pour installer le projet, il va falloir cloner ce repository :

```bash
git clone git@github.com:SorenMesselier-Sentis/job-board-app.git
```

Une fois ça fait, vous aurez besoin d'écrire dans votre terminal la commande suivante :

```bash
composer install
```

suivi de :

```bash
php artisan serv
```

Une fois lancer, vous aurez besoin de faire un ficher `.env` avec vos credentials :

```bash
cp .env.example .env
```

Puis il va falloir générer une clé en local avec cette commande :

```bash
php artisan key:generate
```

Une fois tout cela fait, il reste à générer les données factices :

```bash
php artisan migrate:fresh --seed
```

Et normalement vous aurez accès au projet !

<hr>

## Contributing

Ce projet à été réaliser tout seul en utilisant les pull requests de github.
