<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

$local = [
  'DB_NAME' => 'wp2_bdd',
  'DB_USER' => 'admin',
  'DB_PASSWORD' => 'admin',
  'DB_HOST' => 'localhost'
];
$distant = [
  'DB_NAME' => 'ninap_wp2',
  'DB_USER' => 'ninap',
  'DB_PASSWORD' => 'pXvu3qcH1Ry83Q==',
  'DB_HOST' => 'promo-72.codeur.online'
];
$conInfos = $_SERVER['HTTP_HOST'] == 'localhost' ? $local : $distant;

// // ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', $conInfos['DB_NAME'] );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', $conInfos['DB_USER'] );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', $conInfos['DB_PASSWORD'] );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', $conInfos['DB_HOST'] );

//LOCAL
// // ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
// /** Nom de la base de données de WordPress. */
// define( 'DB_NAME', 'wp2_bdd' );

// /** Utilisateur de la base de données MySQL. */
// define( 'DB_USER', 'admin' );

// /** Mot de passe de la base de données MySQL. */
// define( 'DB_PASSWORD', 'admin' );

// /** Adresse de l’hébergement MySQL. */
// define( 'DB_HOST', 'localhost' );

//DISTANT
// // ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
// /** Nom de la base de données de WordPress. */
// define( 'DB_NAME', 'ninap_wp2' );

// /** Utilisateur de la base de données MySQL. */
// define( 'DB_USER', 'ninap' );

// /** Mot de passe de la base de données MySQL. */
// define( 'DB_PASSWORD', 'pXvu3qcH1Ry83Q==' );

// /** Adresse de l’hébergement MySQL. */
// define( 'DB_HOST', 'promo-72.codeur.online' );


/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '~1pHE?>fqsz{N$<9_yFWmZJ)9YSn.@/fA~oz;z8mX}{)P8^~e`0eQ~PqK5Q<H[%F' );
define( 'SECURE_AUTH_KEY',  'BP9xw!@(~0a Y>$jLKxFXtbE[a%R6BXtfvAZ;`>6l#dZfkHZ=SKS#nADE10zec;?' );
define( 'LOGGED_IN_KEY',    'GPTH;8hd8FK *L`nN>CVBfCgqR Uo&E4(7;ir{#n6oxJzM/#L|dbbfp}A1u4+dz/' );
define( 'NONCE_KEY',        '.Qh*Wyv,mOj/d:ikF-qcld}]jo^Qa9viwQgv&OXq5kMPDMe5/n2^}Dv|OqlO[GP)' );
define( 'AUTH_SALT',        'FFge3UrTr,Z7ymZ$r(UeW./k<]u/0VvLjce@lL_l}j`eXe>:(TM+_;0SvkcvtqdB' );
define( 'SECURE_AUTH_SALT', '5}IXFSc&kOqtn&)nOh`mPoDN/b>{DKMlLwe?F+T]_2IC-D[]b/E!V8Xo_2%KuVqn' );
define( 'LOGGED_IN_SALT',   'egV=N|Fb[bXJv6<}`+F0]ih>$(isz:*^rlu}F8F;J%2VH70Qe0N<Q-{e6@W98_ix' );
define( 'NONCE_SALT',       '9$:op2N&w^P,PTvO>$J<1NP.{/Kh)Hn$vF%8<7r:8^kIs*zE,[Da,4e*l^v-+!7P' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp2_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
