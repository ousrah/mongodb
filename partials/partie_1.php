<!-- =================================================================== -->
<!-- PARTIE 1 : FONDAMENTAUX DE MONGODB ET DU NOSQL -->
<!-- =================================================================== -->
<h2 class="text-3xl font-bold text-gray-800 border-b-2 border-gray-200 pb-2 mb-6">Partie 1 : Fondamentaux de MongoDB et du NoSQL</h2>

<!-- ========== CHAPITRE 1 : INTRODUCTION AUX BASES DE DONNÉES NOSQL ========== -->
<section id="accueil" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Chapitre 1 : Introduction aux bases de données NoSQL</h3>
    <p class="text-xl text-gray-600 mb-8 leading-relaxed">
        Bienvenue dans ce parcours dédié à MongoDB. Alors que les bases de données relationnelles (SGBDR) ont longtemps dominé le paysage informatique, l'ère du Big Data, avec ses fameux "3V" (Volume, Vélocité, Variété), a mis en lumière leurs limites. C'est dans ce contexte qu'a émergé le mouvement <strong>NoSQL</strong> (Not Only SQL), proposant de nouvelles manières de stocker et d'interroger les données, mieux adaptées aux architectures distribuées et aux données non structurées.
    </p>
    <div class="grid md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-green-500">
            <h3 class="text-2xl font-bold mb-2">Flexibilité du Schéma</h3>
            <p class="text-gray-700">Contrairement à la structure rigide des tables SQL, les bases NoSQL comme MongoDB utilisent un schéma flexible. Il n'est pas nécessaire de définir la structure de toutes les données à l'avance, ce qui permet des développements plus agiles et une meilleure adaptation aux changements.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-blue-500">
            <h3 class="text-2xl font-bold mb-2">Scalabilité Horizontale</h3>
            <p class="text-gray-700">Les bases NoSQL sont conçues pour être distribuées sur plusieurs serveurs. Pour gérer une charge plus importante, il suffit d'ajouter de nouvelles machines (scalabilité horizontale), une approche souvent plus économique et résiliente que l'augmentation de la puissance d'un unique serveur (scalabilité verticale).</p>
        </div>
    </div>
    <div class="text-right mt-8"> <a href="#page-top" class="text-sm font-semibold text-blue-600 hover:underline">↑ Retour en haut</a> </div>
</section>

<!-- ========== CHAPITRE 2 : LE MODÈLE ORIENTÉ DOCUMENT (JSON/BSON) ========== -->
<section id="modele-document" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Chapitre 2 : Le modèle orienté document (JSON/BSON)</h3>
    <p class="text-gray-700 mb-4">MongoDB est une base de données orientée <strong>document</strong>. Elle ne stocke pas les données dans des tables avec des lignes et des colonnes, mais dans des collections de documents. Un document est une structure de données composée de paires clé-valeur, similaire au format <strong>JSON</strong> (JavaScript Object Notation).</p>
    <p class="text-gray-700 mb-8">En interne, MongoDB utilise <strong>BSON</strong> (Binary JSON), une représentation binaire du JSON qui est plus performante et supporte des types de données supplémentaires comme les dates, les entiers de 32/64 bits, les timestamps ou les données binaires.</p>

    <div class="bg-white p-6 rounded-lg shadow-sm border space-y-8">
        <div>
            <h4 class="text-lg font-semibold text-gray-900 mb-2">2.1. Anatomie d'un document MongoDB</h4>
            <p class="text-gray-700 mb-4">Un document est un ensemble de paires clé-valeur, délimité par des accolades `{}`. Les clés sont des chaînes de caractères et les valeurs peuvent être de différents types BSON.</p>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-javascript">{
    <span class="token-variable">"_id"</span>: <span class="token-function">ObjectId</span>(<span class="token-string">"635ab3a..."</span>),
    <span class="token-variable">"nom"</span>: <span class="token-string">"Radi"</span>,
    <span class="token-variable">"prenom"</span>: <span class="token-string">"Abdessalam"</span>,
    <span class="token-variable">"genre"</span>: <span class="token-string">"homme"</span>,
    <span class="token-variable">"nbMedailles"</span>: <span class="token-function">Int32</span>(<span class="token-number">4</span>), <span class="token-comment">// Exemple de type BSON</span>
    <span class="token-variable">"sport"</span>: {
        <span class="token-variable">"description"</span>: <span class="token-string">"marathon"</span>,
        <span class="token-variable">"olympique"</span>: <span class="token-keyword">true</span>
    },
    <span class="token-variable">"disciplines"</span>: [ <span class="token-string">"1500m"</span>, <span class="token-string">"5000m"</span>, <span class="token-string">"marathon"</span> ]
}</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
        </div>
    </div>
    <div class="text-right mt-8"> <a href="#page-top" class="text-sm font-semibold text-blue-600 hover:underline">↑ Retour en haut</a> </div>
</section>

<!-- ========== CHAPITRE 3 : INSTALLATION ET OUTILS ========== -->
<section id="installation-outils" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Chapitre 3 : Installation et Outils de l'écosystème</h3>
    <p class="text-gray-700 mb-6">Pour travailler avec MongoDB, plusieurs composants sont nécessaires. L'écosystème MongoDB fournit une suite d'outils puissants pour gérer vos bases de données.</p>
    <div class="space-y-8">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">3.1. Les composants clés</h4>
            <ul class="list-disc ml-6 text-gray-700 space-y-2">
                <li><strong>MongoDB Server (`mongod`) :</strong> Le processus principal de la base de données. C'est le démon qui gère les données, les requêtes et les accès.</li>
                <li><strong>MongoDB Shell (`mongosh`) :</strong> Une interface en ligne de commande interactive pour administrer la base et exécuter des requêtes en JavaScript.</li>
                <li><strong>MongoDB Compass :</strong> Une interface graphique (GUI) qui permet de visualiser, d'interroger et d'analyser vos données de manière intuitive.</li>
                <li><strong>Database Tools :</strong> Une suite d'outils en ligne de commande pour l'import/export de données (`mongoimport`, `mongoexport`) et la sauvegarde/restauration (`mongodump`, `mongorestore`).</li>
            </ul>
        </div>
    </div>
    <div class="text-right mt-8"> <a href="#page-top" class="text-sm font-semibold text-blue-600 hover:underline">↑ Retour en haut</a> </div>
</section>

<!-- ========== CHAPITRE 4 : LES OPÉRATIONS D'ÉCRITURE (INSERT, BULKWRITE) ========== -->
<section id="crud-insert" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Chapitre 4 : Les opérations d'écriture (Insert, BulkWrite)</h3>
    <p class="text-gray-700 mb-6">Créer des données est la première étape fondamentale. MongoDB offre des commandes flexibles pour insérer un ou plusieurs documents à la fois, ainsi qu'une méthode puissante pour exécuter plusieurs opérations d'écriture en un seul lot.</p>
    
    <div class="space-y-8">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">4.1. Insérer un seul document (`insertOne`)</h4>
            <p class="text-gray-700 mb-4">Pour insérer un unique document dans une collection, on utilise la méthode `insertOne()`. Si la collection n'existe pas, MongoDB la crée automatiquement.</p>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-javascript">db.Sportif.insertOne({
    _id: "sp11",
    nom: "Ziyech",
    prenom: "Hakim",
    genre: "homme",
    sport: { description: "football", olympique: true }
})</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">4.2. Insérer plusieurs documents (`insertMany`)</h4>
            <p class="text-gray-700 mb-4">Pour insérer une liste de documents en une seule opération, on utilise `insertMany()`, ce qui est beaucoup plus performant que d'appeler `insertOne()` en boucle. La méthode prend un tableau de documents en argument.</p>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-javascript">db.Sportif.insertMany([
    { _id: "sp12", nom: "Hakimi", prenom: "Achraf", genre: "homme", sport: { description: "football", olympique: true } },
    { _id: "sp13", nom: "Bounou", prenom: "Yassine", genre: "homme", sport: { description: "football", olympique: true } }
])</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">4.3. Opérations en masse (`bulkWrite`)</h4>
            <p class="text-gray-700 mb-4">La méthode `bulkWrite()` est l'outil le plus puissant pour les opérations d'écriture. Elle permet de combiner des insertions, des mises à jour et des suppressions en une seule requête envoyée au serveur, réduisant ainsi la latence réseau et améliorant considérablement les performances.</p>
            <p class="text-gray-700 mb-4">Elle prend en argument un tableau d'opérations. Chaque opération est un objet spécifiant le type d'action (`insertOne`, `updateOne`, `updateMany`, `deleteOne`, `deleteMany`, `replaceOne`) et ses paramètres.</p>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-javascript">db.Sportif.bulkWrite([
    { 
        insertOne: { 
            document: { _id: "sp14", nom: "Amrabat", prenom: "Sofyan", genre: "homme" } 
        } 
    },
    { 
        updateOne: {
            filter: { nom: "Ziyech" },
            update: { $set: { "sport.description": "football pro" } }
        }
    },
    {
        deleteOne: {
            filter: { _id: "sp9" } // On supprime le sportif "Belafrikh"
        }
    }
])</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
        </div>
    </div>
</section>

<!-- ========== ATELIERS PRATIQUES DU CHAPITRE 4 ========== -->
<section id="exercices-chap4" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Ateliers Pratiques : Chapitre 4</h3>
    <p class="text-gray-700 mb-8">Créons notre base de données et insérons notre premier jeu de données complet.</p>
    
    <div class="space-y-10">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice 1 : Créer une base et une collection</h4>
            <p class="text-gray-700 mb-4">En utilisant `mongosh`, basculez sur une nouvelle base de données `DBSportifs`. La commande `use` suffit, la base sera créée physiquement lors de la première insertion.</p>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-javascript"><span class="token-comment">// 1. Se connecter à une base de données (la crée si elle n'existe pas)</span>
use DBSportifs

<span class="token-comment">// 2. Vérifier la base de données actuelle</span>
db</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice 2 : Insérer le jeu de données initial</h4>
            <p class="text-gray-700 mb-4">
                Téléchargez le fichier de données des sportifs : <a href="dbs/sportif.json" class="text-blue-600 hover:underline" download>dbs/sportif.json</a>.
                <br>
                Utilisez la commande `insertMany()` pour insérer tous les sportifs de ce fichier dans votre collection `Sportif`.
            </p>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-javascript">db.Sportif.insertMany([
  {
    "_id": "sp1", "nom": "Radi", "prenom": "Abdessalam", "genre": "homme",
    "sport": { "description": "marathon", "olympique": true }
  },
  {
    "_id": "sp2", "nom": "Larbi", "prenom": "Benmbarek", "genre": "homme",
    "sport": { "description": "football", "olympique": true }
  },
  {
    "_id": "sp3", "nom": "ELGourch", "prenom": "Mohamed", "genre": "homme",
    "sport": { "description": "cyclisme", "olympique": true }
  },
  {
    "_id": "sp4", "nom": "Bidouane", "prenom": "Nezha", "genre": "femme",
    "sport": { "description": "athletisme", "olympique": true }
  },
  {
    "_id": "sp5", "nom": "ELGaraa", "prenom": "Najat", "genre": "femme",
    "sport": { "description": "athletisme", "olympique": true }
  },
  {
    "_id": "sp6", "nom": "Rabii", "prenom": "Mohamed", "genre": "homme",
    "sport": { "description": "box", "olympique": true }
  },
  {
    "_id": "sp7", "nom": "El Guerrouj", "prenom": "Hicham", "genre": "homme",
    "sport": { "description": "athletisme", "olympique": true }, "nbMedailles": 3
  },
  {
    "_id": "sp8", "nom": "Abissourour", "prenom": "Sara", "genre": "femme",
    "sport": { "description": "volley ball", "olympique": true }
  },
  {
    "_id": "sp9", "nom": "Belafrikh", "prenom": "Amine", "genre": "homme",
    "sport": { "description": "Muay Thai", "olympique": false }
  },
  {
    "_id": "sp10", "nom": "Moutawakil", "prenom": "Naoual", "genre": "femme",
    "nbMedailles": 4, "sport": { "description": "athletisme", "olympique": true }
  }
])</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice 3 : Pratiquer `bulkWrite`</h4>
            <p class="text-gray-700 mb-4">Exécutez les opérations suivantes en une seule commande `bulkWrite` :
                <br>1. Insérer un nouveau sportif : `_id: "sp15", nom: "Saibari", prenom: "Ismael", genre: "homme"`.
                <br>2. Mettre à jour Hicham El Guerrouj (`sp7`) pour corriger son sport en "athletisme" (il était noté "box" par erreur).
                <br>3. Augmenter le nombre de médailles de Nezha Bidouane (`sp4`) de 1 (elle n'en avait pas, il faut donc lui en mettre 1).
                <br>4. Supprimer le sportif `sp2` (Larbi Benmbarek).
            </p>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <div class="code-block-wrapper">
                    <pre class="code-block"><code class="language-javascript">db.Sportif.bulkWrite([
    {
        insertOne: {
            document: { _id: "sp15", nom: "Saibari", prenom: "Ismael", genre: "homme", sport: { description: "football", olympique: true } }
        }
    },
    {
        updateOne: {
            filter: { _id: "sp7" },
            update: { $set: { "sport.description": "athletisme" } }
        }
    },
    {
        updateOne: {
            filter: { _id: "sp4" },
            update: { $set: { nbMedailles: 1 } }
        }
    },
    {
        deleteOne: {
            filter: { _id: "sp2" }
        }
    }
])</code></pre>
                    <button class="copy-btn">Copier</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== ATELIERS SOMMATIFS DE LA PARTIE 1 ========== -->
<section id="exercices-sommatifs-partie1" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Ateliers Sommatifs (Partie 1)</h3>
    <p class="text-gray-700 mb-8">Vérifions les acquis de cette première partie sur les fondamentaux et l'insertion de données.</p>

    <div class="space-y-10">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice 1 : Vérification des données</h4>
            <p class="text-gray-700 mb-4">Après avoir exécuté tous les exercices précédents, combien de documents votre collection `Sportif` contient-elle ? Utilisez une commande pour le vérifier.</p>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <div class="code-block-wrapper">
                    <pre class="code-block"><code class="language-javascript"><span class="token-comment">// Compte le nombre total de documents dans la collection.</span>
db.Sportif.countDocuments()

<span class="token-comment">// Ou, une méthode plus ancienne mais toujours fonctionnelle :</span>
db.Sportif.find().count()</code></pre>
                    <button class="copy-btn">Copier</button>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice 2 : Opération d'écriture complexe</h4>
            <p class="text-gray-700 mb-4">
                Créez une nouvelle collection `Equipements`. En une seule commande `bulkWrite`, effectuez les actions suivantes :
                <br>1. Insérez 3 équipements : `{ _id: "eq1", type: "Velo", marque: "B-Twin" }`, `{ _id: "eq2", type: "Gants de Box", marque: "Everlast" }`, `{ _id: "eq3", type: "Chaussures de course", marque: "Nike" }`.
                <br>2. Immédiatement après, modifiez l'équipement `eq1` pour ajouter un champ `modele: "Rockrider"`.
            </p>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <div class="code-block-wrapper">
                    <pre class="code-block"><code class="language-javascript">db.Equipements.bulkWrite([
    { insertOne: { document: { _id: "eq1", type: "Velo", marque: "B-Twin" } } },
    { insertOne: { document: { _id: "eq2", type: "Gants de Box", marque: "Everlast" } } },
    { insertOne: { document: { _id: "eq3", type: "Chaussures de course", marque: "Nike" } } },
    { updateOne: {
        filter: { _id: "eq1" },
        update: { $set: { modele: "Rockrider" } }
    }}
])</code></pre>
                    <button class="copy-btn">Copier</button>
                </div>
            </div>
        </div>
    </div>
</section>