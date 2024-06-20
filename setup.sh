apt-get install snort -y
curl "https://raw.githubusercontent.com/MrCarambole/snort-setup/main/snort.service" >/lib/systemd/system/snort.service
read -p "Interface à utiliser: " inter
sed -i "s/INTERFACE/$inter/g" /lib/systemd/system/snort.service
sudo systemctl daemon-reload
sudo systemctl start snort
sudo chmod 755 /var/log/snort
sudo chmod 644 /var/log/snort/snort.alert.fast
