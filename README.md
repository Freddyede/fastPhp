# Fast PHP: Le Framework PHP Extrêmement Rapide pour les Applications Critiques en Performance




## À Propos de Fast PHP
Fast PHP est un framework web PHP conçu pour les développeurs exigeants qui ne veulent faire aucun compromis sur la vitesse et la performance de leurs applications.
En s'appuyant sur les dernières avancées de PHP (8.x et plus) et sur une architecture à faible surcharge, Fast PHP permet de construire des applications web, des APIs RESTFULL et des microservices qui répondent avec une latence minimale, même sous forte charge.
Notre philosophie est simple : la performance ne doit pas sacrifier l'élégance du code ni la productivité du développeur.
Fast PHP fournit un ensemble d'outils expressifs, une structure claire et des conventions intelligentes qui vous permettent de vous concentrer sur la logique métier, tandis que le framework gère les complexités sous-jacentes avec une efficacité redoutable.
Que vous bâtissiez le prochain service haute fréquence ou une application web qui nécessite une réactivité instantanée, Fast PHP est votre allié.

## Fonctionnalités Clés
Fast PHP est livré avec une multitude de fonctionnalités conçues pour la vitesse et la flexibilité :
- Architecture Orientée Performance:
  - Démarrage à Froid Optimisé : Minimise le temps de chargement initial.
  - Abstractions Légères : Réduit la surcharge du framework pour chaque requête.
  - Compatible JIT : Conçu pour tirer pleinement parti de la compilation JIT de PHP 8+, offrant des gains de performance significatifs.
  - Moteur de Requêtes Asynchrone (Optionnel) : Possibilité d'intégrer des gestionnaires de requêtes non-bloquants pour les opérations I/O intensif (nécessite Swoole/ReactPHP).
  - Routage Expressif & Rapide :
  Définissez des routes claires et performantes pour vos requêtes HTTP.
  ```php
    use FastPHP\Routing\Route;
    
    Route::get('/users/{id}', 'UserController@show');
    Route::post('/articles', [ArticleController::class, 'store']);
    Route::put('/posts/{post}', fn($post) => /* ... */);
    ```
  - Velocity ORM (Object-Relational Mapper) :
  Interagissez avec votre base de données de manière intuitive et efficace avec notre ORM inspiré d'ActiveRecord, optimisé pour les requêtes rapides.
  ```php
    
    use FastPHP\Database\Model;
    
    class User extends Model
    {
    protected string $table = 'users';
    }    
    $user = User::find(1);
    $activeUsers = User::where('status', 'active')->limit(10)->get();
  ```

  - Velocity Templates (Moteur de Templating) :
  Un moteur de templating rapide et léger, inspiré par Blade, qui compile vos vues en code PHP pur pour des performances maximales.

  ```bladehtml
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Fast PHP</title>
    </head>
    <body>
        <h1>Hello, {{ $name ?? 'World' }}!</h1>
        @if ($user)
            <p>Welcome back, {{ $user->name }}!</p>
        @else
            <p>Please log in.</p>
        @endif
    </body>
    </html>
  ```

  - Interface de Ligne de Commande (fp CLI) :
  Un puissant outil en ligne de commande pour accélérer votre développement : générez des contrôleurs, des modèles, exécutez des migrations, gérez des caches et bien plus encore.

  ```bash
    fp make:controller AuthController
    fp make:model Product
    fp migrate
    fp cache:clear
    fp serve
  ```

  - Système de Middleware Robuste :
  Filtrez et modifiez les requêtes HTTP entrantes et sortantes pour l'authentification, la journalisation, la gestion de CORS, etc.
  ```php
    // Exemple de middleware d'authentification
    class AuthenticateUser
    {
        public function handle(Request $request, Closure $next)
        {
            if (! Auth::check()) {
                return redirect('/login');
            }
            return $next($request);
        }
    }
  ```
  - Injection de Dépendances (Légère) :
  Un conteneur d'inversion de contrôle (IoC) simple et performant pour la résolution de dépendances et l'auto-câblage.

  ```php
    class UserService
    {
    public function __construct(private UserRepository $userRepository) {}
    // ...
    }
  ```

  - Gestion des Sessions et Authentification :
  Des mécanismes flexibles et sécurisés pour la gestion des sessions utilisateur et l'authentification.

  ```php
    // Dans un contrôleur
    if (Auth::attempt($credentials)) {
    // Authentification réussie
    }
  ```
  - Validation Intuitive :
  Validez les données entrantes avec une API fluide et expressive.

  ```php
    use FastPHP\Validation\Validator;
    
    $validator = Validator::make($request->all(), [
    'email'    => 'required|email|unique:users',
    'password' => 'required|min:8',
    ]);
    
    if ($validator->fails()) {
    return back()->withErrors($validator);
    }
  ```
  - Gestion des Erreurs et Journalisation :
  Des outils intégrés pour une gestion robuste des exceptions et une journalisation flexible.
  - Système de Cache Flexible :
  Intégrez facilement Redis, Memcached ou un cache basé sur les fichiers pour optimiser les performances de votre application.
  - Queues (Files d'Attente) :
  Déchargez les longues tâches (envoi d'e-mails, traitement d'images) vers des files d'attente pour améliorer la réactivité de l'application.
  - Événements et Listeners :
  Implémentez facilement le motif observateur pour découpler les responsabilités et réagir aux événements de votre application.

## Pour Commencer
### Prérequis Système
Assurez-vous que votre serveur respecte les exigences suivantes :

- PHP >= 8.1 (PHP 8.2+ recommandé pour le JIT et les performances maximales)
- Extensions PHP : mbstring, pdo, json, tokenizer, xml, fileinfo (pour UploadedFile si utilisé), bcmath (pour le chiffrement si utilisé).
- Composer
### Installation
1. Via Composer (Recommandé) :
La méthode la plus simple pour créer une nouvelle application Fast PHP est d'utiliser Composer.
```bash
composer create-project fastphp/fastphp my-app
cd my-app
 ```
2. Via l'installateur Fast PHP (si disponible globalement) :
Si vous avez installé l'installateur Fast PHP globalement :

```bash
fp new my-app
cd my-app
```

### Votre Première Application Fast PHP
Une fois votre projet installé, vous pouvez démarrer le serveur de développement local :

```bash
fp serve
```
Votre application sera accessible à l'adresse http://127.0.0.1:8000.

Ouvrez le fichier routes/web.php et ajoutez cette simple route :

```php
use FastPHP\Routing\Route;

Route::get('/', function () {
return "Hello, Fast PHP!";
});
Route::get('/welcome/{name}', function ($name) {
return view('welcome', ['name' => $name]);
});
```
Si vous utilisez le moteur de templating Velocity, créez le fichier resources/views/welcome.vel.php :

HTML

```bladehtml
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome to Fast PHP</title>
</head>
<body>
    <h1>Welcome, {{ $name }}!</h1>
</body>
</html>
```
Maintenant, accédez à http://127.0.0.1:8000/ ou http://127.0.0.1:8000/welcome/John dans votre navigateur.

## Documentation
La documentation complète et détaillée pour Fast PHP se trouve sur le site officiel de la documentation Fast PHP.

## Contribution
Nous encourageons les contributions à Fast PHP ! Si vous souhaitez améliorer le framework, veuillez consulter notre guide de contribution.

## Communauté et Support
Discord Officiel : Rejoignez notre communauté sur Discord pour poser des questions, partager des idées et obtenir de l'aide.
Forums : Visitez les forums officiels de Fast PHP sur forums.fastphp.dev.
Stack Overflow : Utilisez le tag fastphp sur Stack Overflow pour les questions de développement.
Rapports de Vulnérabilités de Sécurité
Si vous découvrez une faille de sécurité dans Fast PHP, veuillez envoyer un e-mail à security@fastphp.dev au lieu d'utiliser le traqueur de problèmes public. Toutes les vulnérabilités seront rapidement traitées.

## Licence
Fast PHP est un logiciel open-source sous [licence MIT](LICENSE).