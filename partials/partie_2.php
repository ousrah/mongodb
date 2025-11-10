<!-- =================================================================== -->
<!-- PARTIE 2 : INTERROGATION AVANCÉE DES DONNÉES -->
<!-- =================================================================== -->
<h2 class="text-3xl font-bold text-gray-800 border-b-2 border-gray-200 pb-2 mb-6">Partie 2 : Interrogation Avancée des Données</h2>

<!-- ========== CHAPITRE 5 : LIRE LES DONNÉES AVEC FIND() ========== -->
<section id="find-bases" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Chapitre 5 : Lire les données avec find()</h3>
    <p class="text-gray-700 mb-6">La commande la plus fondamentale pour lire des données dans MongoDB est `find()`. Elle permet de retrouver des documents au sein d'une collection. Utilisée sans argument, elle retourne tous les documents. Pour affiner la recherche, on lui passe un document de filtrage en premier argument.</p>
    <div class="bg-white p-6 rounded-lg shadow-sm border">
        <h4 class="text-xl font-bold text-gray-800 mb-2">5.1. Syntaxe de base</h4>
        <div class="code-block-wrapper">
            <pre class="code-block"><code class="language-javascript"><span class="token-comment">// Retrouver tous les documents</span>
db.collection.find({})

<span class="token-comment">// Retrouver les documents correspondant à un critère</span>
db.collection.find({ champ: "valeur" })

<span class="token-comment">// Exemple : trouver tous les sportifs de genre "homme"</span>
db.Sportif.find({ "genre": "homme" })

<span class="token-comment">// Interroger un champ dans un sous-document</span>
db.Sportif.find({ "sport.description": "cyclisme" })
</code></pre>
            <button class="copy-btn">Copier</button>
        </div>
    </div>
</section>

<!-- ========== ATELIERS PRATIQUES DU CHAPITRE 5 ========== -->
<section id="exercices-chap5" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Ateliers Pratiques : Chapitre 5</h3>
    <p class="text-gray-700 mb-8">Utilisons la collection `Sportif` pour mettre en pratique les requêtes de base avec `find()`.</p>

    <div class="space-y-10">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice 1</h4>
            <p class="text-gray-700 mb-4">Quels sont les sportifs de genre « femme » ?</p>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <div class="code-block-wrapper">
                    <pre class="code-block"><code class="language-javascript">db.Sportif.find({genre: "femme"})</code></pre>
                    <button class="copy-btn">Copier</button>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice 2</h4>
            <p class="text-gray-700 mb-4">Quel(s) sont les sportifs qui pratiquent le cyclisme ?</p>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <div class="code-block-wrapper">
                    <pre class="code-block"><code class="language-javascript">db.Sportif.find({"sport.description": "cyclisme"})</code></pre>
                    <button class="copy-btn">Copier</button>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ========== CHAPITRE 6 : OPÉRATEURS DE REQUÊTE ET FILTRAGE AVANCÉ ========== -->
<section id="filtrage-avance" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Chapitre 6 : Opérateurs de requête et filtrage avancé</h3>
    <p class="text-gray-700 mb-6">Pour construire des requêtes complexes, MongoDB offre une panoplie d'opérateurs de requête, reconnaissables à leur préfixe `$`.</p>
    <div class="space-y-8">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">6.1. Opérateurs de comparaison</h4>
            <p class="text-gray-700 mb-4">Ils permettent de filtrer les documents en comparant la valeur d'un champ.</p>
            <ul class="list-disc ml-6 text-gray-600 text-sm space-y-1 mb-4">
                <li>`$eq` : égal à (souvent implicite).</li>
                <li>`$ne` : non égal à.</li>
                <li>`$gt` : supérieur à (greater than).</li>
                <li>`$gte` : supérieur ou égal à.</li>
                <li>`$lt` : inférieur à (less than).</li>
                <li>`$lte` : inférieur ou égal à.</li>
                <li>`$in` : la valeur est dans un tableau de possibilités.</li>
                <li>`$nin` : la valeur n'est dans aucun élément du tableau.</li>
            </ul>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-javascript"><span class="token-comment">// Sportifs ayant plus de 2 médailles</span>
db.Sportif.find({ "nbMedailles": { $gt: 2 } })

<span class="token-comment">// Sportifs pratiquant le 'box' ou le 'cyclisme'</span>
db.Sportif.find({ "sport.description": { $in: [ "box", "cyclisme" ] } })
</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">6.2. Opérateurs logiques</h4>
             <p class="text-gray-700 mb-4">Ils combinent plusieurs conditions.</p>
            <ul class="list-disc ml-6 text-gray-600 text-sm space-y-1 mb-4">
                <li>`$and` : ET logique (souvent implicite en séparant les champs par une virgule).</li>
                <li>`$or` : OU logique.</li>
                <li>`$not` : Inverse une condition.</li>
            </ul>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-javascript"><span class="token-comment">// Sportifs de genre "femme" OU qui ont plus de 3 médailles</span>
db.Sportif.find({
    $or: [
        { "genre": "femme" },
        { "nbMedailles": { $gt: 3 } }
    ]
})
</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">6.3. Opérateur d'élément (`$exists`)</h4>
             <p class="text-gray-700 mb-4">Cet opérateur permet de sélectionner les documents en fonction de la présence ou de l'absence d'un champ. C'est très utile dans un schéma flexible où tous les documents n'ont pas forcément les mêmes champs.</p>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-javascript"><span class="token-comment">// Trouver les sportifs qui ont un champ "nbMedailles"</span>
db.Sportif.find({ "nbMedailles": { $exists: true } })

<span class="token-comment">// Trouver les sportifs qui N'ONT PAS de champ "nbMedailles"</span>
db.Sportif.find({ "nbMedailles": { $exists: false } })
</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
        </div>
    </div>
</section>

<!-- ========== ATELIERS PRATIQUES DU CHAPITRE 6 ========== -->
<section id="exercices-chap6" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Ateliers Pratiques : Chapitre 6</h3>
    <p class="text-gray-700 mb-8">Appliquons ces opérateurs de filtrage à notre collection `Sportif`.</p>
    <div class="space-y-10">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice 1</h4>
            <p class="text-gray-700 mb-4">Afficher les sportifs qui ont exactement 4 médailles.</p>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <div class="code-block-wrapper">
                    <pre class="code-block"><code class="language-javascript">db.Sportif.find({nbMedailles: 4})</code></pre>
                    <button class="copy-btn">Copier</button>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice 2</h4>
            <p class="text-gray-700 mb-4">Afficher les sportifs qui pratiquent les sports suivants : box, athletisme et cyclisme.</p>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <div class="code-block-wrapper">
                    <pre class="code-block"><code class="language-javascript">db.Sportif.find({"sport.description": {$in: ["box", "athletisme", "cyclisme"]}})</code></pre>
                    <button class="copy-btn">Copier</button>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice 3</h4>
            <p class="text-gray-700 mb-4">Afficher les sportifs qui n'ont pas de médailles (champ `nbMedailles` manquant).</p>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <div class="code-block-wrapper">
                    <pre class="code-block"><code class="language-javascript">db.Sportif.find({nbMedailles: {$exists: false}})</code></pre>
                    <button class="copy-btn">Copier</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== CHAPITRE 7 : PROJECTION, TRI ET PAGINATION ========== -->
<section id="projection-tri" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Chapitre 7 : Projection, Tri et Pagination</h3>
    <p class="text-gray-700 mb-6">Après avoir filtré les documents, il est souvent nécessaire de formater le résultat : choisir les champs à afficher (projection), trier les documents et n'en retourner qu'un sous-ensemble (pagination).</p>
    <div class="space-y-8">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">7.1. Projection : Choisir les champs à afficher</h4>
            <p class="text-gray-700 mb-4">La projection est le second argument de la méthode `find()`. C'est un document où l'on spécifie les champs à inclure (avec la valeur `1`) ou à exclure (avec la valeur `0`). Par défaut, le champ `_id` est toujours inclus, sauf si on l'exclut explicitement.</p>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-javascript"><span class="token-comment">// Afficher uniquement le nom et prénom des sportifs, sans leur _id</span>
db.Sportif.find(
    {}, // Filtre vide pour tout sélectionner
    { "nom": 1, "prenom": 1, "_id": 0 } // Document de projection
)
</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">7.2. Tri (`sort`) et Pagination (`limit`, `skip`)</h4>
            <p class="text-gray-700 mb-4">Les méthodes `sort()`, `limit()` et `skip()` se "chaînent" après un `find()` pour manipuler le curseur de résultat.</p>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-javascript"><span class="token-comment">// Afficher les 3 sportifs ayant le plus de médailles, triés par ordre décroissant</span>
db.Sportif.find({ "nbMedailles": { $exists: true } })
    .sort({ "nbMedailles": -1 }) // -1 pour décroissant, 1 pour croissant
    .limit(3) // Ne retourner que 3 documents
</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
        </div>
    </div>
</section>

<!-- ========== ATELIERS PRATIQUES DU CHAPITRE 7 ========== -->
<section id="exercices-chap7" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Ateliers Pratiques : Chapitre 7</h3>
    <p class="text-gray-700 mb-8">Formatons les résultats de nos requêtes.</p>
    <div class="space-y-10">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice 1</h4>
            <p class="text-gray-700 mb-4">Afficher les sportifs (nom et prenom) triés par ordre alphabétique des noms.</p>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <div class="code-block-wrapper">
                    <pre class="code-block"><code class="language-javascript">db.Sportif.find({}, {nom:1, prenom:1, _id:0}).sort({nom:1})</code></pre>
                    <button class="copy-btn">Copier</button>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice 2</h4>
            <p class="text-gray-700 mb-4">Afficher les deux premières femmes sportives de la base de données (tous les champs).</p>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <div class="code-block-wrapper">
                    <pre class="code-block"><code class="language-javascript">db.Sportif.find({genre: "femme"}).limit(2)</code></pre>
                    <button class="copy-btn">Copier</button>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice 3</h4>
            <p class="text-gray-700 mb-4">Afficher les noms et prénoms des sportifs qui ont plus que deux médailles.</p>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <div class="code-block-wrapper">
                    <pre class="code-block"><code class="language-javascript">db.Sportif.find({nbMedailles: {$gt: 2}}, {nom:1, prenom:1, _id:0})</code></pre>
                    <button class="copy-btn">Copier</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== ATELIERS SOMMATIFS DE LA PARTIE 2 ========== -->
<section id="exercices-sommatifs-partie2" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Ateliers Sommatifs (Partie 2)</h3>
    <p class="text-gray-700 mb-8">Appliquons tous les concepts de recherche et de filtrage sur un jeu de données plus riche.</p>

    <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-800 p-4 mb-8" role="alert">
        <h4 class="font-bold">Prérequis pour les exercices</h4>
        <p>Pour les exercices suivants, vous devez utiliser la base de données `restaurants`.</p>
        <ol class="list-decimal ml-6 mt-2 text-sm">
            <li>Téléchargez le fichier de données : <a href="dbs/restaurants.json" class="font-semibold hover:underline" download>dbs/restaurants.json</a>.</li>
            <li>Créez une base de données (ex: `DEV203`) et importez le fichier dans une collection `restaurants` avec la commande suivante dans votre terminal :
                <div class="code-block-wrapper my-2">
                    <pre class="code-block !p-2 !text-sm"><code class="language-bash">mongoimport --db DEV203 --collection restaurants --file /chemin/vers/restaurants.json</code></pre>
                    <button class="copy-btn">Copier</button>
                </div>
            </li>
        </ol>
    </div>

    <h4 class="text-xl font-bold text-gray-800 mb-4 mt-10">Exercices Inversés : Analysez la Requête</h4>
    <p class="text-gray-700 mb-8">Le travail ici est inversé. Pour chaque requête ci-dessous, analysez sa syntaxe et décrivez précisément le résultat qu'elle produit. Essayez de taper la requête vous-même pour bien mémoriser la syntaxe. Cliquez ensuite sur 'Voir la solution' pour comparer votre analyse.</p>

    <div class="space-y-10">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h5 class="text-lg font-semibold text-gray-800 mb-2">Requête 1</h5>
            <div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.restaurants.find( { "borough" : "Brooklyn" } ).count()</code></pre></div>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <p class="text-gray-700"><strong>Explication :</strong> Cette requête compte et retourne le nombre total de documents (restaurants) qui se trouvent dans le quartier 'Brooklyn'.</p>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h5 class="text-lg font-semibold text-gray-800 mb-2">Requête 2</h5>
            <div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.restaurants.find(
    { "borough" : "Brooklyn",
      "cuisine" : "Italian",
      "name" : /pizza/i }
)</code></pre></div>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <p class="text-gray-700"><strong>Explication :</strong> Affiche les documents complets des restaurants qui remplissent trois conditions : être dans le quartier 'Brooklyn', proposer une cuisine 'Italian', ET dont le nom contient le mot "pizza". L'option `/i` rend la recherche insensible à la casse (Pizza, pizza, PiZzA...).</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h5 class="text-lg font-semibold text-gray-800 mb-2">Requête 3 (Projection)</h5>
            <div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.restaurants.find(
    {"borough":"Manhattan",
     "grades.score":{$lt : 10}
    },
    {"name":1,"grades.score":1, "_id":0})</code></pre></div>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <p class="text-gray-700"><strong>Explication :</strong> Recherche les restaurants de 'Manhattan' qui ont au moins une note (`score`) inférieure à 10. Pour les documents correspondants, elle n'affiche que les champs `name` et `grades.score`, tout en masquant explicitement le champ `_id`.</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h5 class="text-lg font-semibold text-gray-800 mb-2">Requête 4 (elemMatch)</h5>
            <div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.restaurants.find({
    "grades" : {
           $elemMatch : {
               "grade" : "C",
               "score" : {$lt :40}
           }
    }
})</code></pre></div>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <p class="text-gray-700"><strong>Explication :</strong> Recherche les restaurants qui ont au moins un élément dans leur tableau `grades` qui satisfait les deux conditions SIMULTANÉMENT : le `grade` est "C" ET le `score` est inférieur à 40 pour cette même évaluation. C'est plus précis qu'une simple requête AND qui pourrait trouver un restaurant avec un grade "C" et un score faible sur deux évaluations différentes.</p>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h5 class="text-lg font-semibold text-gray-800 mb-2">Requête 5 (Index de tableau)</h5>
            <div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.restaurants.find(
    {"grades.0.grade":"C"},
    {"name":1, "borough":1, "_id":0}
)</code></pre></div>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <p class="text-gray-700"><strong>Explication :</strong> Affiche les noms et les quartiers des restaurants dont la toute première évaluation (à l'index 0 du tableau `grades`) a un `grade` égal à "C".</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h5 class="text-lg font-semibold text-gray-800 mb-2">Requête 6 (Distinct)</h5>
            <div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.restaurants.distinct("grades.grade")</code></pre></div>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <p class="text-gray-700"><strong>Explication :</strong> Cette requête ne retourne pas de documents, mais un tableau contenant la liste de toutes les valeurs uniques (sans doublons) trouvées dans le champ `grade` à l'intérieur du tableau `grades` pour toute la collection.</p>
            </div>
        </div>
    </div>
</section>
<!-- =================================================================== -->
<!-- ATELIERS SOMMATIFS (SUITE) : REQUÊTES SUR MOVIES ET DBLP -->
<!-- =================================================================== -->
<section id="exercices-sommatifs-partie2-suite" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Ateliers Sommatifs (Suite) : Pratique sur `movies` et `dblp`</h3>
    <p class="text-gray-700 mb-8">Mettons en pratique les techniques d'interrogation sur de nouveaux jeux de données.</p>

    <!-- Exercices sur la collection movies -->
    <div class="mb-12">
        <h4 class="text-xl font-bold text-gray-800 mb-4">Exercices sur la collection `movies`</h4>
        <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-800 p-4 mb-8" role="alert">
            <h5 class="font-bold">Prérequis</h5>
            <ol class="list-decimal ml-6 mt-2 text-sm">
                <li>Téléchargez le fichier de données : <a href="dbs/movies.json" class="font-semibold hover:underline" download>dbs/movies.json</a>.</li>
                <li>Importez le fichier dans une collection `movies` avec la commande suivante :
                    <div class="code-block-wrapper my-2">
                        <pre class="code-block !p-2 !text-sm"><code class="language-bash">mongoimport --db VOTRE_DB --collection movies --file /chemin/vers/movies.json --jsonArray</code></pre>
                    </div>
                </li>
            </ol>
        </div>
        <div class="space-y-10">
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <p class="text-gray-700 mb-4"><strong>Question 1 :</strong> Écrivez la requête pour trouver les films dont le nom contient le mot « forest ».</p>
                <button class="solution-toggle">Voir la requête</button>
                <div class="solution-content"><div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.movies.find({ title: /forest/i })</code></pre></div></div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <p class="text-gray-700 mb-4"><strong>Question 2 :</strong> Écrivez la requête pour trouver les films dans lesquels participe l’acteur « Tom Hanks ».</p>
                <button class="solution-toggle">Voir la requête</button>
                <div class="solution-content"><div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.movies.find({ "cast": "Tom Hanks" })</code></pre></div></div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <p class="text-gray-700 mb-4"><strong>Question 3 :</strong> Écrivez la requête pour trouver les films de France produits avant 1990 (inclus).</p>
                <button class="solution-toggle">Voir la requête</button>
                <div class="solution-content"><div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.movies.find({ countries: "France", year: { $lte: 1990 } })</code></pre></div></div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <p class="text-gray-700 mb-4"><strong>Question 4 :</strong> Comptez le nombre de films qui ont un rating imdb supérieur ou égal à 7.</p>
                <button class="solution-toggle">Voir la requête</button>
                <div class="solution-content"><div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.movies.countDocuments({ "imdb.rating": { $gte: 7 } })</code></pre></div></div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <p class="text-gray-700 mb-4"><strong>Question 5 :</strong> Trouvez les films dont le titre commence par « The » (insensible à la casse).</p>
                <button class="solution-toggle">Voir la requête</button>
                <div class="solution-content"><div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.movies.find({ 'title': { $regex: /^The/i } })</code></pre></div></div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <p class="text-gray-700 mb-4"><strong>Question 6 :</strong> Triez les films de « Tom Hanks » par score imdb dans l’ordre décroissant.</p>
                <button class="solution-toggle">Voir la requête</button>
                <div class="solution-content"><div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.movies.find({ "cast": "Tom Hanks" }).sort({ "imdb.rating": -1 })</code></pre></div></div>
            </div>
        </div>
    </div>

    <!-- Exercices sur la collection dblp -->
    <div class="mt-16">
        <h4 class="text-xl font-bold text-gray-800 mb-4">Exercices sur la collection `dblp`</h4>
        <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-800 p-4 mb-8" role="alert">
            <h5 class="font-bold">Prérequis</h5>
            <ol class="list-decimal ml-6 mt-2 text-sm">
                <li>Téléchargez le fichier de données : <a href="dbs/dblp.json" class="font-semibold hover:underline" download>dbs/dblp.json</a>.</li>
                <li>Importez le fichier dans une collection `dblp` avec la commande suivante :
                    <div class="code-block-wrapper my-2">
                        <pre class="code-block !p-2 !text-sm"><code class="language-bash">mongoimport --db VOTRE_DB --collection dblp --file /chemin/vers/dblp.json --jsonArray</code></pre>
                    </div>
                </li>
            </ol>
        </div>
        <div class="space-y-10">
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <p class="text-gray-700 mb-4"><strong>Question 1 :</strong> Écrivez la requête pour lister tous les livres (type « Book ») publiés depuis 2014.</p>
                <button class="solution-toggle">Voir la requête</button>
                <div class="solution-content"><div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.dblp.find({ "year": { "$gte": 2014 }, "type": "Book" })</code></pre></div></div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <p class="text-gray-700 mb-4"><strong>Question 2 :</strong> Listez tous les auteurs distincts de la collection.</p>
                <button class="solution-toggle">Voir la requête</button>
                <div class="solution-content"><div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.dblp.distinct('authors')</code></pre></div></div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <p class="text-gray-700 mb-4"><strong>Question 3 :</strong> Triez les publications de « Toru Ishida » par titre de livre (croissant) et par page de début (croissant), en affichant uniquement le titre et les pages.</p>
                <button class="solution-toggle">Voir la requête</button>
                <div class="solution-content"><div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.dblp.find(
    { 'authors': 'Toru Ishida' },
    { "title": 1, "pages": 1, "_id": 0 }
).sort({ "title": 1, "pages.start": 1 })</code></pre></div></div>
            </div>
        </div>
    </div>
</section>
