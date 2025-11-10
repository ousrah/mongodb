<!-- =================================================================== -->
<!-- PARTIE 4 : ADMINISTRATION ET CONNEXION APPLICATIVE -->
<!-- =================================================================== -->
<h2 class="text-3xl font-bold text-gray-800 border-b-2 border-gray-200 pb-2 mb-6">Partie 4 : Administration et Connexion Applicative</h2>

<!-- ========== CHAPITRE 12 : SAUVEGARDE ET RESTAURATION ========== -->
<section id="backup-restore" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Chapitre 12 : Sauvegarde et Restauration</h3>
    <p class="text-gray-700 mb-6">La sauvegarde régulière des données est une tâche critique. MongoDB fournit les <strong>Database Tools</strong>, une suite d'utilitaires en ligne de commande pour effectuer des sauvegardes (`mongodump`) et des restaurations (`mongorestore`) de manière efficace.</p>
    
    <div class="space-y-8">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">12.1. Sauvegarder (`mongodump`)</h4>
            <p class="text-gray-700 mb-4">La commande `mongodump` crée une sauvegarde binaire (BSON) de votre base de données. Elle s'exécute depuis le terminal de votre système d'exploitation, et non depuis `mongosh`.</p>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-bash"><span class="token-comment"># Sauvegarde simple d'une base de données spécifique</span>
mongodump --db DBSportifs --out=/chemin/vers/backup/

<span class="token-comment"># Sauvegarde avec authentification</span>
mongodump --authenticationDatabase admin --username root --password VOTRE_PASS --db DBSportifs --out=/chemin/vers/backup/
</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">12.2. Restaurer (`mongorestore`)</h4>
            <p class="text-gray-700 mb-4">La commande `mongorestore` permet de restaurer une base de données à partir d'un répertoire de sauvegarde créé par `mongodump`. L'option `--drop` est utile pour supprimer les collections existantes avant de les restaurer.</p>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-bash"><span class="token-comment"># Restauration simple (le nom de la DB est déduit du nom du dossier)</span>
mongorestore --drop /chemin/vers/backup/DBSportifs

<span class="token-comment"># Restauration avec authentification</span>
mongorestore --authenticationDatabase admin --username root --password VOTRE_PASS --drop /chemin/vers/backup/DBSportifs
</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
        </div>
    </div>
    <div class="text-right mt-8"> <a href="#page-top" class="text-sm font-semibold text-blue-600 hover:underline">↑ Retour en haut</a> </div>
</section>

<!-- ========== CHAPITRE 13 : GESTION DES UTILISATEURS ET DES RÔLES ========== -->
<section id="securite" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Chapitre 13 : Gestion des Utilisateurs et des Rôles</h3>
    <p class="text-gray-700 mb-6">Sécuriser l'accès à vos données est primordial. MongoDB intègre un système d'authentification et de contrôle d'accès basé sur les rôles (RBAC - Role-Based Access Control) qui permet de définir précisément qui peut faire quoi.</p>
    
    <div class="space-y-8">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">13.1. Activer l'authentification</h4>
            <p class="text-gray-700 mb-4">L'authentification doit être activée dans le fichier de configuration de MongoDB (`mongod.cfg`).</p>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-yaml">security:
  authorization: "enabled"</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
            <p class="text-gray-700 mt-4">Après avoir modifié ce fichier, le service MongoDB doit être redémarré.</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">13.2. Créer un utilisateur</h4>
            <p class="text-gray-700 mb-4">La commande `db.createUser()` permet de créer un utilisateur en lui assignant un nom, un mot de passe et un ou plusieurs rôles sur une base de données spécifique.</p>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-javascript"><span class="token-comment">// Se connecter à la base 'admin' pour créer un super-utilisateur</span>
use admin
db.createUser({
    user: "superAdmin",
    pwd: passwordPrompt(), // Pour une saisie sécurisée du mot de passe
    roles: [ { role: "root", db: "admin" } ]
})

<span class="token-comment">// Créer un utilisateur avec des droits de lecture seule sur la base 'DBSportifs'</span>
use DBSportifs
db.createUser({
    user: "guest",
    pwd: "guest123",
    roles: [ { role: "read", db: "DBSportifs" } ]
})</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
        </div>
    </div>
    <div class="text-right mt-8"> <a href="#page-top" class="text-sm font-semibold text-blue-600 hover:underline">↑ Retour en haut</a> </div>
</section>

<!-- ========== CHAPITRE 14 : INTERROGER MONGODB AVEC PYTHON (PYMONGO) ========== -->
<section id="pymongo" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Chapitre 14 : Interroger MongoDB avec Python (PyMongo)</h3>
    <p class="text-gray-700 mb-6">MongoDB peut être interrogé depuis n'importe quel langage de programmation via des "drivers". Pour Python, le driver officiel et de référence est <strong>PyMongo</strong>. Il fournit une interface simple et pythonique pour interagir avec la base de données.</p>
    <div class="space-y-8">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">14.1. Installation et Connexion</h4>
            <p class="text-gray-700 mb-4">L'installation se fait via `pip`. La connexion est établie en instanciant la classe `MongoClient`.</p>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-python"><span class="token-comment"># 1. Installation</span>
pip install pymongo

<span class="token-comment"># 2. Connexion et récupération d'une collection</span>
from pymongo import MongoClient

<span class="token-comment"># Créer une connexion au serveur MongoDB</span>
client = MongoClient('mongodb://localhost:27017/')

<span class="token-comment"># Sélectionner la base de données</span>
db = client['DBSportifs']

<span class="token-comment"># Sélectionner la collection</span>
collection = db['Sportif']
</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">14.2. Exécuter une requête</h4>
            <p class="text-gray-700 mb-4">La méthode `find()` de PyMongo retourne un objet `Cursor`, qui est un itérable. Il suffit de boucler dessus pour accéder aux documents.</p>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-python"><span class="token-comment"># Rechercher tous les sportifs de genre "femme" et n'afficher que leur nom</span>
filtre = { "genre": "femme" }
projection = { "nom": 1, "prenom": 1, "_id": 0 }

cursor = collection.find(filtre, projection)

<span class="token-comment"># Itérer sur les résultats et les afficher</span>
for sportif in cursor:
    print(sportif)
</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
        </div>
    </div>
    <div class="text-right mt-8"> <a href="#page-top" class="text-sm font-semibold text-blue-600 hover:underline">↑ Retour en haut</a> </div>
</section>

<!-- ========== ATELIERS SOMMATIFS DE LA PARTIE 4 ========== -->
<section id="exercices-sommatifs-partie4" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Ateliers Sommatifs (Partie 4)</h3>
    <p class="text-gray-700 mb-8">Mettons en place une configuration de sécurité complète et entraînons-nous à sauvegarder et restaurer nos données.</p>

    <div class="space-y-10">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice : Mettre en place la sécurité</h4>
            <p class="text-gray-700 mb-4">
                1. Activez l'authentification sur votre serveur MongoDB.<br>
                2. Créez un utilisateur `root` sur la base `admin`.<br>
                3. Créez un utilisateur `guest` sur la base `DBSportifs` avec uniquement les droits de lecture.<br>
                4. Connectez-vous avec `guest` et vérifiez que vous ne pouvez pas insérer de document dans la collection `Sportif`.
            </p>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <div class="code-block-wrapper">
                    <pre class="code-block"><code class="language-javascript"><span class="token-comment">// -- Étape 1 : Modifier le fichier mongod.cfg et redémarrer le service --</span>

<span class="token-comment">// -- Étape 2 : Créer l'utilisateur root (connecté sans authentification pour la première fois) --</span>
use admin
db.createUser({ 
    user: "root", 
    pwd: "123456", 
    roles: [ { role: "root", db: "admin" } ] 
});

<span class="token-comment">// -- Étape 3 : Se reconnecter avec l'utilisateur root et créer le guest --</span>
<span class="token-comment">// > mongosh --authenticationDatabase "admin" -u "root" -p "123456"</span>
use DBSportifs
db.createUser({ 
    user: "guest", 
    pwd: "123456", 
    roles: [ { role: "read", db: "DBSportifs" } ] 
});

<span class="token-comment">// -- Étape 4 : Se reconnecter avec guest et tester --</span>
<span class="token-comment">// > mongosh --authenticationDatabase "DBSportifs" -u "guest" -p "123456"</span>
use DBSportifs
db.Sportif.find({}).limit(1) <span class="token-comment">// Devrait fonctionner</span>
db.Sportif.insertOne({ title: "Test" }) <span class="token-comment">// Devrait échouer avec une erreur d'autorisation</span>
</code></pre>
                    <button class="copy-btn">Copier</button>
                </div>
            </div>
        </div>
    </div>
</section>