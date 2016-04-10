<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 * @modified by JackieAtHome (www.jackieathome.net)
 */

// ** MySQL settings - You can get this info from your web host ** //

// ** 文件上传设置, 可根据需要修改 ** //
/** SAE Storage Domain名称 */
define('SAE_STORAGE', 'wordpress');

/** 文件上传路径 */ 
define('SAE_DIR','/uploads');

// ** MySQL 设置 - 已适配SAE,无需修改 ** //
/** WordPress 数据库的名称 */
define('DB_NAME', SAE_MYSQL_DB);

/** MySQL 数据库用户名 */
define('DB_USER', SAE_MYSQL_USER);

/** MySQL 数据库密码 */
define('DB_PASSWORD', SAE_MYSQL_PASS);

/** MySQL 主机 */
define('DB_HOST', SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT);

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

define('WP_USE_MULTIPLE_DB', true);

$db_list = array(
		'write'=> array(
				array(
						'db_host' => SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,
						'db_user'=> SAE_MYSQL_USER,
						'db_password'=> SAE_MYSQL_PASS,
						'db_name'=> SAE_MYSQL_DB,
						'db_charset'=> 'utf8'
				)
		),
		'read'=> array(
				array(
						'db_host' => SAE_MYSQL_HOST_S.':'.SAE_MYSQL_PORT,
						'db_user'=> SAE_MYSQL_USER,
						'db_password'=> SAE_MYSQL_PASS,
						'db_name'=> SAE_MYSQL_DB,
						'db_charset'=> 'utf8'
				)
		),
);
$global_db_list = $db_list['write'];

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         hash_hmac('sha1', SAE_ACCESSKEY . 'AUTH_KEY', SAE_SECRETKEY ));
define('SECURE_AUTH_KEY',  hash_hmac('sha1', SAE_ACCESSKEY . 'SECURE_AUTH_KEY', SAE_SECRETKEY ));
define('LOGGED_IN_KEY',    hash_hmac('sha1', SAE_ACCESSKEY . 'LOGGED_IN_KEY', SAE_SECRETKEY ));
define('NONCE_KEY',        hash_hmac('sha1', SAE_ACCESSKEY . 'NONCE_KEY', SAE_SECRETKEY ));
define('AUTH_SALT',        hash_hmac('sha1', SAE_ACCESSKEY . 'AUTH_SALT', SAE_SECRETKEY ));
define('SECURE_AUTH_SALT', hash_hmac('sha1', SAE_ACCESSKEY . 'SECURE_AUTH_SALT', SAE_SECRETKEY ));
define('LOGGED_IN_SALT',   hash_hmac('sha1', SAE_ACCESSKEY . 'LOGGED_IN_SALT', SAE_SECRETKEY ));
define('NONCE_SALT',       hash_hmac('sha1', SAE_ACCESSKEY . 'NONCE_SALT', SAE_SECRETKEY ));

define('WP_CACHE_KEY_SALT',       hash_hmac('sha1', SAE_ACCESSKEY . 'WP_CACHE_KEY_SALT', SAE_SECRETKEY ));

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';
/**
 * WordPress语言设置，中文版本默认为中文。
 *
 * 本项设定能够让WordPress显示您需要的语言。
 * wp-content/languages内应放置同名的.mo语言文件。
 * 例如，要使用WordPress简体中文界面，请在wp-content/languages
 * 放入zh_CN.mo，并将WPLANG设为'zh_CN'。
 */
define('WPLANG', 'zh_CN');
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/**
 * 关闭Wordpress的自动更新能力
 * http://www.wpmee.com/wp-update-everything/
 */
define( 'AUTOMATIC_UPDATER_DISABLED', true );

/**
 * 关闭定时任务
 */
define('DISABLE_WP_CRON', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
