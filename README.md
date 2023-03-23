# php-online
php在线执行代码
## how to run
```bash
composer install
bower install
docker-composer up -d

# build ace
cd public/bower/ace
npm install
make build

# caddy 创建访问密码
caddy hash-password mychatpasswordisempty.|base64
```
访问 http://localhost:7890/ or http://localhost:7890/code.html





# bug
- [ ] libreOffice Calc 复制内容不能粘贴到编辑器，是否因为编辑器的粘贴监听事件处理问题导致
