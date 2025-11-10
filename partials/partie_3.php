<!-- =================================================================== -->
<!-- PARTIE 3 : MANIPULATION ET AGRÉGATION -->
<!-- =================================================================== -->
<h2 class="text-3xl font-bold text-gray-800 border-b-2 border-gray-200 pb-2 mb-6">Partie 3 : Manipulation et Agrégation</h2>

<!-- ========== CHAPITRE 8 : MISE À JOUR ET SUPPRESSION DE DONNÉES ========== -->
<section id="modification-donnees" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Chapitre 8 : Mise à Jour et Suppression de données</h3>
    <p class="text-gray-700 mb-6">Au-delà de la lecture et de la création, la modification et la suppression (Update, Delete) sont des opérations cruciales. MongoDB fournit des méthodes précises pour mettre à jour des champs spécifiques, remplacer des documents entiers, ou en supprimer un ou plusieurs.</p>
    <div class="space-y-8">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">8.1. Mise à jour de champs (`updateOne`, `updateMany`)</h4>
            <p class="text-gray-700 mb-4">Pour modifier des champs spécifiques sans toucher au reste du document, on utilise `updateOne()` (modifie le premier document trouvé) ou `updateMany()` (modifie tous les documents correspondants). Ces méthodes utilisent des <strong>opérateurs de mise à jour</strong> comme `$set` pour modifier une valeur, `$inc` pour l'incrémenter, ou `$unset` pour supprimer un champ.</p>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-javascript"><span class="token-comment">// Mettre à jour le nbMedailles du sportif "Rabii Mohamed"</span>
db.Sportif.updateOne(
   { "nom" : "Rabii", "prenom": "Mohamed" },
   { $set: { "nbMedailles" : 2 } }
)

<span class="token-comment">// Ajouter un champ "nationalite" à TOUS les sportifs</span>
db.Sportif.updateMany(
   {}, // Un filtre vide cible tous les documents
   { $set: { "nationalite": "marocaine" } }
)</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">8.2. Remplacement de document (`replaceOne`)</h4>
            <p class="text-gray-700 mb-4">Contrairement à `updateOne` qui modifie des champs, `replaceOne` <strong>supprime le document existant</strong> (correspondant au filtre) et le remplace par un nouveau, tout en conservant l'`_id` d'origine. Tous les anciens champs qui ne sont pas dans le nouveau document sont perdus.</p>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-javascript"><span class="token-comment">// Remplacer entièrement les données de "Radi Abdessalam"</span>
db.Sportif.replaceOne(
    { _id: "sp1" },
    { nom: "Radi", prenom: "Abdessalam", genre: "homme", sport: "Marathon Pro", retraité: true }
)
<span class="token-comment">// Le champ "sport" n'est plus un objet, et le champ "olympique" a disparu.</span>
</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">8.3. Suppression de documents (`deleteOne`, `deleteMany`)</h4>
            <p class="text-gray-700 mb-4">La suppression suit une logique similaire avec `deleteOne()` (supprime le premier document trouvé) et `deleteMany()` (supprime tous les documents correspondants).</p>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-javascript"><span class="token-comment">// Supprimer le sportif qui pratique le "Muay Thai"</span>
db.Sportif.deleteOne({ "sport.description": "Muay Thai" })

<span class="token-comment">// Supprimer tous les sportifs dont le nom est "ELGourch"</span>
db.Sportif.deleteMany({ "nom": "ELGourch" })
</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
        </div>
    </div>
</section>

<!-- ========== ATELIERS PRATIQUES DU CHAPITRE 8 ========== -->
<section id="exercices-chap8" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Ateliers Pratiques : Chapitre 8</h3>
    <p class="text-gray-700 mb-8">Manipulons les données de notre collection `Sportif`.</p>
    <div class="space-y-10">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice 1</h4>
            <p class="text-gray-700 mb-4">Mettre à jour le champ nbMedailles du sportif « Rabii Mohamed » pour y mettre la valeur 2.</p>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <div class="code-block-wrapper">
                    <pre class="code-block"><code class="language-javascript">db.Sportif.updateOne(
  {nom: "Rabii", prenom: "Mohamed"},
  {$set: {nbMedailles: 2}}
)</code></pre>
                    <button class="copy-btn">Copier</button>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice 2</h4>
            <p class="text-gray-700 mb-4">Pour tous les sportifs, ajouter un champ « nationalité » avec la valeur « marocaine ».</p>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <div class="code-block-wrapper">
                    <pre class="code-block"><code class="language-javascript">db.Sportif.updateMany(
  {},
  {$set: {nationalite: "marocaine"}}
)</code></pre>
                    <button class="copy-btn">Copier</button>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice 3</h4>
            <p class="text-gray-700 mb-4">Supprimer le sportif qui s'appelle `Belafrikh`.</p>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <div class="code-block-wrapper">
                    <pre class="code-block"><code class="language-javascript">db.Sportif.deleteOne({nom: "Belafrikh"})</code></pre>
                    <button class="copy-btn">Copier</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== CHAPITRE 9 : INTRODUCTION AU FRAMEWORK D'AGRÉGATION ========== -->
<section id="aggregation-intro" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Chapitre 9 : Introduction au Framework d'Agrégation</h3>
    <p class="text-gray-700 mb-6">Pour les analyses de données complexes qui vont au-delà de la simple recherche, MongoDB propose le <strong>Framework d'Agrégation</strong>. Il fonctionne comme un "pipeline" (un tuyau) où les documents d'une collection passent à travers une série d'étapes (les "stages"). Chaque étape transforme les documents (filtrage, regroupement, tri, etc.) et les transmet à l'étape suivante.</p>
    <div class="bg-white p-6 rounded-lg shadow-sm border">
        <h4 class="text-xl font-bold text-gray-800 mb-2">Syntaxe de base</h4>
        <p class="text-gray-700 mb-4">La méthode `aggregate()` prend en argument un tableau contenant la liste des étapes du pipeline.</p>
        <div class="code-block-wrapper">
            <pre class="code-block"><code class="language-javascript">db.collection.aggregate([
  { <span class="token-comment">// Étape 1 : par exemple, un filtre $match</span> },
  { <span class="token-comment">// Étape 2 : par exemple, un regroupement $group</span> },
  { <span class="token-comment">// Étape 3 : par exemple, un tri $sort</span> }
])</code></pre>
            <button class="copy-btn">Copier</button>
        </div>
    </div>
    <div class="text-right mt-8"> <a href="#page-top" class="text-sm font-semibold text-blue-600 hover:underline">↑ Retour en haut</a> </div>
</section>

<!-- ========== CHAPITRE 10 : REGROUPEMENT AVEC $GROUP ET $MATCH ========== -->
<section id="aggregation-group" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Chapitre 10 : Regroupement avec `$group` et `$match`</h3>
    <p class="text-gray-700 mb-6">Deux des étapes les plus utilisées dans un pipeline d'agrégation sont `$match` pour le filtrage en amont et `$group` pour le regroupement et le calcul.</p>
    <div class="space-y-8">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">10.1. `$match` : Filtrer les documents</h4>
            <p class="text-gray-700 mb-4">L'étape `$match` filtre les documents pour ne passer que ceux qui correspondent à la condition. Sa syntaxe est identique à celle d'une requête `find()`. Il est recommandé de placer `$match` le plus tôt possible dans le pipeline pour réduire le volume de données à traiter.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">10.2. `$group` : Regrouper et calculer</h4>
            <p class="text-gray-700 mb-4">L'étape `$group` regroupe les documents en fonction d'une clé (`_id`) et permet d'appliquer des <strong>accumulateurs</strong> sur chaque groupe pour calculer des sommes (`$sum`), des moyennes (`$avg`), des maximums (`$max`), des minimums (`$min`), etc.</p>
            <div class="code-block-wrapper">
                <pre class="code-block"><code class="language-javascript"><span class="token-comment">// Calculer le nombre total de médailles par genre</span>
db.Sportif.aggregate([
    // Étape 1: Filtrer pour ne garder que les sportifs ayant des médailles
    { $match: { "nbMedailles": { $exists: true } } },
    
    // Étape 2: Regrouper par genre et calculer la somme des médailles
    { $group: {
        _id: "$genre", // La clé de regroupement est le champ 'genre'
        "totalMedailles": { $sum: "$nbMedailles" } 
    }}
])</code></pre>
                <button class="copy-btn">Copier</button>
            </div>
        </div>
    </div>
</section>

<!-- ========== ATELIERS PRATIQUES DU CHAPITRE 10 ========== -->
<section id="exercices-chap10" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Ateliers Pratiques : Chapitre 10</h3>
    <p class="text-gray-700 mb-8">Effectuons nos premières agrégations sur la collection `Sportif`.</p>
    <div class="space-y-10">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice 1</h4>
            <p class="text-gray-700 mb-4">Calculer la somme des médailles par sport.</p>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <div class="code-block-wrapper">
                    <pre class="code-block"><code class="language-javascript">db.Sportif.aggregate([
  {$group: {_id: "$sport.description", totalMedailles: {$sum: "$nbMedailles"}}}
])</code></pre>
                    <button class="copy-btn">Copier</button>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice 2</h4>
            <p class="text-gray-700 mb-4">Afficher le maximum de médailles par sport.</p>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <div class="code-block-wrapper">
                    <pre class="code-block"><code class="language-javascript">db.Sportif.aggregate([
  {$group: {_id: "$sport.description", maxMedailles: {$max: "$nbMedailles"}}}
])</code></pre>
                    <button class="copy-btn">Copier</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== CHAPITRE 11 : DÉCOMPOSER LES TABLEAUX AVEC $UNWIND ========== -->
<section id="aggregation-unwind" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Chapitre 11 : Décomposer les tableaux avec `$unwind`</h3>
    <p class="text-gray-700 mb-6">Que faire si l'on veut regrouper des informations qui se trouvent à l'intérieur d'un tableau ? Par exemple, compter le nombre de films par acteur ? L'étape `$unwind` est la solution. Elle prend un document contenant un tableau et crée une copie du document pour chaque élément du tableau.</p>
    <div class="bg-white p-6 rounded-lg shadow-sm border">
        <h4 class="text-xl font-bold text-gray-800 mb-2">Exemple : Calculer le nombre de films par acteur</h4>
        <div class="code-block-wrapper">
            <pre class="code-block"><code class="language-javascript"><span class="token-comment">// Document original dans la collection 'movies'</span>
<span class="token-comment">// { title: "Forrest Gump", cast: ["Tom Hanks", "Robin Wright"] }</span>

db.movies.aggregate([
    <span class="token-comment">// Étape 1: Décomposer le tableau 'cast'</span>
    { $unwind: "$cast" },
    <span class="token-comment">// Résultat intermédiaire :</span>
    <span class="token-comment">// { title: "Forrest Gump", cast: "Tom Hanks" }</span>
    <span class="token-comment">// { title: "Forrest Gump", cast: "Robin Wright" }</span>

    <span class="token-comment">// Étape 2: Regrouper par acteur</span>
    {
        $group: {
            _id: "$cast",
            total_films: { $sum: 1 }
        }
    },

    <span class="token-comment">// Étape 3: Trier par le nombre de films décroissant</span>
    { $sort: { total_films: -1 } }
])</code></pre>
            <button class="copy-btn">Copier</button>
        </div>
    </div>
</section>

<!-- ========== ATELIERS SOMMATIFS DE LA PARTIE 3 ========== -->
<section id="exercices-sommatifs-partie3" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Ateliers Sommatifs (Partie 3)</h3>
    <p class="text-gray-700 mb-8">Combinons la modification de données et les pipelines d'agrégation pour des analyses complexes.</p>

    <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-800 p-4 mb-8" role="alert">
        <h4 class="font-bold">Prérequis pour les exercices</h4>
        <p>Les exercices suivants utilisent les collections `movies` et `restaurants`. Assurez-vous de les avoir importées.</p>
        <ul class="list-disc ml-6 mt-2 text-sm">
            <li><a href="dbs/movies.json" class="font-semibold hover:underline" download>Télécharger movies.json</a></li>
            <li><a href="dbs/restaurants.json" class="font-semibold hover:underline" download>Télécharger restaurants.json</a></li>
            <li><a href="dbs/dblp.json" class="font-semibold hover:underline" download>Télécharger dblp.json (pour une pratique personnelle)</a></li>
        </ul>
    </div>
    
    <div class="space-y-10">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice 1 : Modification de données</h4>
            <p class="text-gray-700 mb-4">Dans la collection `movies`, ajoutez un nouveau film, puis modifiez son année et enfin, supprimez-le.</p>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <div class="code-block-wrapper">
                    <pre class="code-block"><code class="language-javascript"><span class="token-comment">// 1. Ajouter un nouveau film</span>
db.movies.insertOne({
    title: "Mon Film Test",
    year: 2023,
    cast: ["Acteur Inconnu"]
})

<span class="token-comment">// 2. Modifier l'année du film ajouté</span>
db.movies.updateOne(
    { title: "Mon Film Test" },
    { $set: { year: 2024 } }
)

<span class="token-comment">// 3. Supprimer le film</span>
db.movies.deleteOne({ title: "Mon Film Test" })</code></pre>
                    <button class="copy-btn">Copier</button>
                </div>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Exercice 2 : Agrégation simple</h4>
            <p class="text-gray-700 mb-4">Dans la collection `movies`, affichez le nombre de films produits par pays, trié par ordre décroissant du nombre de films.</p>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <div class="code-block-wrapper">
                    <pre class="code-block"><code class="language-javascript">db.movies.aggregate([
   { $unwind : '$countries' },
   { $group : { '_id' : '$countries', count : { $sum : 1 } } },
   { $sort: { count: -1 } }
])</code></pre>
                    <button class="copy-btn">Copier</button>
                </div>
            </div>
        </div>
    </div>

    <h4 class="text-xl font-bold text-gray-800 mb-4 mt-10">Exercices Inversés : Analysez le Pipeline d'Agrégation</h4>
    <p class="text-gray-700 mb-8">Analysez chaque pipeline d'agrégation ci-dessous sur la collection `restaurants`. Décrivez le rôle de chaque étape et le résultat final produit. L'utilisation de variables pour stocker les étapes est une bonne pratique pour la clarté et la réutilisation.</p>
    
    <div class="space-y-10">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h5 class="text-lg font-semibold text-gray-800 mb-2">Agrégation 1</h5>
            <div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">varMatch = { $match : { "grades.0.grade":"C"} };
varProject = { $project : {"name":1, "borough":1, "_id":0}};
varSort = { $sort : {"name":1} };

db.restaurants.aggregate( [ varMatch, varProject, varSort ] );</code></pre></div>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <p class="text-gray-700"><strong>Explication :</strong> Ce pipeline affiche les noms et les quartiers des restaurants dont le premier grade est 'C', et trie les résultats par nom par ordre alphabétique croissant. Les étapes sont stockées dans des variables pour une meilleure lisibilité et pour permettre de les réutiliser facilement.</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h5 class="text-lg font-semibold text-gray-800 mb-2">Agrégation 2</h5>
            <div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.restaurants.aggregate([
  {   $group: { _id: { cuisine: "$cuisine", borough: "$borough" } }  },
  {   $project: { _id: 0, cuisine: "$_id.cuisine", borough: "$_id.borough" } },
  {   $sort:  {  borough: 1, cuisine: 1 }  }
])</code></pre></div>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <p class="text-gray-700"><strong>Explication :</strong> Cette agrégation retourne la liste de toutes les combinaisons uniques de "cuisine" et "quartier" qui existent dans la collection.
                <br><strong>Étape 1 (`$group`):</strong> Regroupe les documents par couple unique de cuisine et quartier.
                <br><strong>Étape 2 (`$project`):</strong> Reformate la sortie pour afficher `cuisine` et `borough` comme des champs de premier niveau, au lieu d'être imbriqués dans `_id`.
                <br><strong>Étape 3 (`$sort`):</strong> Trie les résultats par quartier, puis par cuisine.</p>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h5 class="text-lg font-semibold text-gray-800 mb-2">Agrégation 3</h5>
            <div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">varMatch = { $match : { "grades.0.grade":"C"} };
varGroup = { $group : {"_id" : "$borough", "total" : {$sum : 1} } };

db.restaurants.aggregate( [ varMatch, varGroup ] );</code></pre></div>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <p class="text-gray-700"><strong>Explication :</strong> Cette agrégation compte, pour chaque quartier, le nombre de restaurants dont le premier grade est "C".
                <br><strong>Étape 1 (`$match`):</strong> Filtre et ne conserve que les restaurants dont le premier grade est 'C'.
                <br><strong>Étape 2 (`$group`):</strong> Regroupe les restaurants restants par quartier (`_id: "$borough"`) et, pour chaque groupe, calcule le nombre de documents (`$sum: 1`).</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h5 class="text-lg font-semibold text-gray-800 mb-2">Agrégation 4</h5>
            <div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">varUnwind = {$unwind : "$grades"};
varGroup = { $group : {"_id" : "$borough", "moyenne" : {$avg : "$grades.score"} } };
varSort = { $sort : { "moyenne" : -1 } };

db.restaurants.aggregate( [ varUnwind, varGroup, varSort ] );</code></pre></div>
            <button class="solution-toggle">Voir la solution</button>
            <div class="solution-content">
                <p class="text-gray-700"><strong>Explication :</strong> Calcule le score moyen de toutes les évaluations pour chaque quartier, puis trie les résultats pour afficher les quartiers avec les meilleures moyennes en premier.
                <br><strong>Étape 1 (`$unwind`):</strong> Décompose le tableau `grades` de chaque restaurant, créant une copie du restaurant pour chaque évaluation qu'il contient.
                <br><strong>Étape 2 (`$group`):</strong> Regroupe les documents par quartier et calcule la moyenne (`$avg`) des scores de toutes les évaluations de ce quartier.
                <br><strong>Étape 3 (`$sort`):</strong> Trie les quartiers par leur `moyenne` en ordre décroissant (-1).</p>
            </div>
        </div>
    </div>
</section>
<!-- =================================================================== -->
<!-- ATELIERS SOMMATIFS (SUITE) : AGRÉGATIONS SUR MOVIES ET DBLP -->
<!-- =================================================================== -->
<section id="exercices-sommatifs-partie3-suite" class="mb-16">
    <h3 class="text-2xl font-semibold mb-3">Ateliers Sommatifs (Suite) : Agrégations sur `movies` et `dblp`</h3>
    <p class="text-gray-700 mb-8">Passons à des analyses plus complexes en utilisant le puissant framework d'agrégation.</p>

    <!-- Exercices d'agrégation sur la collection movies -->
    <div class="mb-12">
        <h4 class="text-xl font-bold text-gray-800 mb-4">Agrégations sur la collection `movies`</h4>
        <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-800 p-4 mb-8" role="alert">
            <h5 class="font-bold">Prérequis</h5>
            <p class="text-sm">Assurez-vous d'avoir importé la collection <a href="dbs/movies.json" class="font-semibold hover:underline" download>`movies.json`</a>.</p>
        </div>
        <div class="space-y-10">
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <p class="text-gray-700 mb-4"><strong>Question 1 :</strong> Calculez le nombre de films par acteur, trié par ordre alphabétique du nom de l'acteur.</p>
                <button class="solution-toggle">Voir la requête</button>
                <div class="solution-content"><div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.movies.aggregate([
    { $unwind: '$cast' },
    { $group: { '_id': '$cast', totalfilm: { $sum: 1 } } },
    { $sort: { '_id': 1 } }
])</code></pre></div></div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <p class="text-gray-700 mb-4"><strong>Question 2 :</strong> Affichez la liste des acteurs qui ont participé à plus de 10 films.</p>
                <button class="solution-toggle">Voir la requête</button>
                <div class="solution-content"><div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.movies.aggregate([
    { $unwind: '$cast' },
    { $group: { '_id': '$cast', totalfilm: { $sum: 1 } } },
    { $match: { totalfilm: { $gt: 10 } } }
])</code></pre></div></div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <p class="text-gray-700 mb-4"><strong>Question 3 :</strong> Calculez la note imdb moyenne des films de « Steven Spielberg ».</p>
                <button class="solution-toggle">Voir la requête</button>
                <div class="solution-content"><div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.movies.aggregate([
    { $match: { directors: "Steven Spielberg" } },
    { $group: { _id: "Steven Spielberg", moyenne: { $avg: "$imdb.rating" } } }
])</code></pre></div></div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <p class="text-gray-700 mb-4"><strong>Question 4 :</strong> Affichez le nombre de films par genre, en n'affichant que les 5 genres les plus populaires.</p>
                <button class="solution-toggle">Voir la requête</button>
                <div class="solution-content"><div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.movies.aggregate([
    { $unwind: '$genres' },
    { $group: { _id: '$genres', nombre: { $sum: 1 } } },
    { $sort: { nombre: -1 } },
    { $limit: 5 }
])</code></pre></div></div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <p class="text-gray-700 mb-4"><strong>Question 5 :</strong> Donnez les cinq meilleurs réalisateurs de l’année 2000, classés par la note moyenne de leurs films.</p>
                <button class="solution-toggle">Voir la requête</button>
                <div class="solution-content"><div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.movies.aggregate([
  { $match: { year: 2000, "imdb.rating": { $type: "number" } } },
  { $unwind: "$directors" },
  { $group: { _id: "$directors", avgRating: { $avg: "$imdb.rating" } } },
  { $sort: { avgRating: -1 } },
  { $limit: 5 }
])</code></pre></div></div>
            </div>
        </div>
    </div>

    <!-- Exercices d'agrégation sur la collection dblp -->
    <div class="mt-16">
        <h4 class="text-xl font-bold text-gray-800 mb-4">Agrégations sur la collection `dblp`</h4>
        <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-800 p-4 mb-8" role="alert">
            <h5 class="font-bold">Prérequis</h5>
            <p class="text-sm">Assurez-vous d'avoir importé la collection <a href="dbs/dblp.json" class="font-semibold hover:underline" download>`dblp.json`</a>.</p>
        </div>
        <div class="space-y-10">
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <p class="text-gray-700 mb-4"><strong>Question 1 :</strong> Comptez le nombre de publications par type depuis 2011.</p>
                <button class="solution-toggle">Voir la requête</button>
                <div class="solution-content"><div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.dblp.aggregate([
    { $match: { year: { $gte: 2011 } } },
    { $group: { '_id': '$type', nombre: { $sum: 1 } } }
])</code></pre></div></div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <p class="text-gray-700 mb-4"><strong>Question 2 :</strong> Pour chaque type, donnez le nombre d'ouvrages édités depuis 2011, en n’affichant que les types qui ont plus de 1000 publications.</p>
                <button class="solution-toggle">Voir la requête</button>
                <div class="solution-content"><div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.dblp.aggregate([
    { $match: { year: { $gte: 2011 } } },
    { $group: { '_id': '$type', nombre: { $sum: 1 } } },
    { $match: { nombre: { $gte: 1000 } } }
])</code></pre></div></div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <p class="text-gray-700 mb-4"><strong>Question 3 :</strong> Comptez le nombre de publications par auteur et triez le résultat par ordre croissant du nombre de publications.</p>
                <button class="solution-toggle">Voir la requête</button>
                <div class="solution-content"><div class="code-block-wrapper"><pre class="code-block"><code class="language-javascript">db.dblp.aggregate([
    { $unwind: '$authors' },
    { $group: { _id: '$authors', nombre: { $sum: 1 } } },
    { $sort: { nombre: 1 } }
])</code></pre></div></div>
            </div>
        </div>
    </div>
</section>
