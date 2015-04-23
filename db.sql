DROP TABLE IF EXISTS `cmf_desc`;
CREATE TABLE `cmf_desc` (
  `id`         INT(10) UNSIGNED    NOT NULL AUTO_INCREMENT,
  `time`       INT(10) UNSIGNED    NOT NULL DEFAULT '0',
  `user_id`    INT(10) UNSIGNED    NOT NULL DEFAULT '0',
  `text`       TEXT                NOT NULL,
  `ip`         BIGINT(11)          NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `time` (`time`),
  KEY `ip` (`ip`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS `cmf_users`;
CREATE TABLE `cmf_users` (
  `id`            INT(10) UNSIGNED    NOT NULL AUTO_INCREMENT,
  `name`          VARCHAR(25)         NOT NULL DEFAULT '',
  `password`      VARCHAR(32)         NOT NULL DEFAULT '',
  `rights`        TINYINT(3) UNSIGNED NOT NULL DEFAULT '0',
  `regdate`       INT(10) UNSIGNED    NOT NULL DEFAULT '0',
  `ip`            BIGINT(11)          NOT NULL DEFAULT '0',
  `browser`       TEXT                NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `ip` (`ip`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8;