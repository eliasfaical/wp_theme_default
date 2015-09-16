<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'antonionog');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'antonionog');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'h7x8n6m7');

/** nome do host do MySQL */
define('DB_HOST', 'mysql.antonionog.com');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ks.o>pr%jHjB}?iT>)=<}.2?(kti)oG3)nTh.}b|]gcm%!]]Kn82#Q[N{:]xVkUb');
define('SECURE_AUTH_KEY',  'JP>M~082-j%%1Nb=bpW!SvfJ@a_yt/FUTvA;6g;c+S#y0io}mr7>t~,1|oR]LrN{');
define('LOGGED_IN_KEY',    'YB(/~1mv?umLP6;X{k0O)j*51-%y|L+6f5$l|/dDK%v@}<v(=?JR[y{JLa%$Q[ha');
define('NONCE_KEY',        'uTKwhAO}|SDYm)2? db1C+@FEjqJR&L-7#@OKYm,JvZ:>XbWNB87&**C:IzxDo}R');
define('AUTH_SALT',        '5cu:3 8_%!Gb5K(RSRqp!{=56Y()Xy<0j`I-Y-e|VUi*||rB+/~P77a Axl/-;`a');
define('SECURE_AUTH_SALT', '#pXRoWLvax]5&<*n8b$gw[qg(GQCMYD1QmAXxja-UifMJ7CCMrLyyiEzXaSR)Vdz');
define('LOGGED_IN_SALT',   '3=?d_^!x/l{&_>yHx/PVyr:8w#^ZJCr=A[l*r28j2h-HQY}|q>+g%[S1&26?O~Js');
define('NONCE_SALT',       '9Mgoxo,TH~UkR]e=TXXXtOLB-A-kpD|_v((8YD]HJG-,Dc^Yx1{-TcxE| -P&P4=');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'rbvxrzae_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);
define('WPCF7_AUTOP', false);
define('WP_POST_REVISIONS', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
