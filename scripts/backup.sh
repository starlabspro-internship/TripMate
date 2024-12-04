#!/bin/bash

# credentials from .env
DB_USER="root"
DB_PASSWORD="123"
DB_NAME="tripmate"
BACKUP_DIR="/var/www/TripMate/database_backups"

# backup dir
mkdir -p $BACKUP_DIR

#  backup with time and date
BACKUP_FILE="$BACKUP_DIR/backup_$(date +%F_%T).sql"

#  mysql dump
mysqldump -u $DB_USER -p$DB_PASSWORD $DB_NAME > $BACKUP_FILE

# Compress
gzip $BACKUP_FILE

# Delete backups after 30 days
find $BACKUP_DIR -type f -name "*.gz" -mtime +30 -exec rm -f {} \;

# log completion
echo "Database backup completed at $(date)" >> /var/log/db_backup.log

