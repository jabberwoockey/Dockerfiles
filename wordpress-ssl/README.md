### How to use

- Download and unpack [Wordpress](https://wordpress.org/latest.zip)
  into the `./wordpress` directory (`wp-content` should be right under the
  `./wordpress` directory)

- *(Optional)* Set ports, container names, volume paths in the
  'docker-compose.yml' file

- Create `.env` file (`vim .env` or `nano .env`) and set your own values:

```
DB_USER=wpadmin
DB_PASSWORD=wordpress
DB_NAME=wordpress
DB_ROOT_PASSWORD=wordpress
```

- Replace a domain name in the `nginx.conf` (substitute `yourdomain.com`):
  
`sed -i 's/domain.tld/yourdomain.com/g' ./nginx-conf/nginx.conf `

- Get certificates from Let’s Encrypt on the host machine
  (substitute `yourdomain.com` and `your@gmail.com`):
  
`sudo dnf install certbot`

```
sudo certbot certonly --manual \
    --agree-tos --no-eff-email \
    --preferred-challenges dns \
    --server https://acme-v02.api.letsencrypt.org/directory \
    --manual-public-ip-logging-ok \
    --email your@gmail.com \
    -d '*.yourdomain.com' -d yourdomain.com  
```

- Run `docker-compose up -d`

---

If SELinux is enabled, add `:z` to paths in the .yml file.

If Wordpress can't write to disk, check your UID (`id`) and replace in .yml:

`user: <yourUID>:<yourGID>`

---

