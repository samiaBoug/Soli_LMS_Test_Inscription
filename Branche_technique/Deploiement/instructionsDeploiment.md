# **Guide de Déploiement Laravel avec Nginx, PHP et MySQL**

## **1️⃣ Installation des dépendances**

### **Mettre à jour le système**

```bash
sudo apt update && sudo apt upgrade -y
```

### **Installer Nginx**

```bash
sudo apt install nginx -y
```

### **Installer PHP et les extensions requises**

```bash
sudo apt install php8.3 php8.3-fpm php8.3-mbstring php8.3-xml php8.3-bcmath php8.3-curl php8.3-zip php8.3-mysql unzip -y
```

### **Installer Composer**

```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

### **Installer MySQL**

```bash
sudo apt install mysql-server -y
```

Configurer MySQL :

```bash
sudo mysql_secure_installation
```

Créer une base de données et un utilisateur Laravel :

```bash
sudo mysql -u root -p
```

```sql
CREATE DATABASE laravel_db;
CREATE USER 'laravel_user'@'localhost' IDENTIFIED BY 'motdepasse';
GRANT ALL PRIVILEGES ON laravel_db.* TO 'laravel_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

---

## **2️⃣ Déploiement de l'application Laravel**

### **Télécharger le projet Laravel**

Si ton projet est sur GitHub :

```bash
cd /var/www
sudo git clone https://github.com/utilisateur/mon-projet.git laravel
cd laravel
```

Sinon, tu peux le transférer avec SFTP.

### **Installer les dépendances PHP**

```bash
composer install --no-dev --optimize-autoloader
```

### **Configurer les permissions**

```bash
sudo chown -R www-data:www-data /var/www/laravel
sudo chmod -R 775 /var/www/laravel/storage /var/www/laravel/bootstrap/cache
```

### **Configurer l’environnement**

```bash
cp .env.example .env
nano .env
```

Modifier :

```
APP_NAME="Mon Application"
APP_ENV=production
APP_KEY= # Généré ci-dessous
APP_DEBUG=false
APP_URL=http://mon-domaine.com

DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=motdepasse
```

Générer la clé d’application :

```bash
php artisan key:generate
```

### **Exécuter les migrations**

```bash
php artisan migrate --force
```

---

## **3️⃣ Configuration de Nginx**

### **Créer un fichier de configuration pour Laravel**

```bash
sudo nano /etc/nginx/sites-available/laravel
```

Ajouter :

```nginx
server {
    listen 80;
    server_name mon-domaine.com;
    root /var/www/laravel/public;

    index index.php index.html index.htm;
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

### **Activer la configuration**

```bash
sudo ln -s /etc/nginx/sites-available/laravel /etc/nginx/sites-enabled/
sudo rm /etc/nginx/sites-enabled/default
```

Vérifier et redémarrer Nginx :

```bash
sudo nginx -t
sudo systemctl restart nginx
```

---

## **4️⃣ Installer et Configurer Vite**

Si ton projet utilise Vite :

```bash
npm install
npm run build
```

Vérifier que `vite.config.js` est correct :

```js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
```

---

## **5️⃣ Lancer Laravel en Production**

### **Vider les caches**

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
```

### **Démarrer le programme de fond** (si nécessaire)

```bash
php artisan queue:restart
```

Vérifier si tout fonctionne en ouvrant [**http://mon-domaine.com**](http://mon-domaine.com) 🚀

Si besoin d’un certificat SSL :

```bash
sudo apt install certbot python3-certbot-nginx
sudo certbot --nginx -d mon-domaine.com
```

---

## **✅ Laravel est déployé avec succès !** 🎉

