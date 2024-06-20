apt-get update -y
apt-get upgrade -y
apt-get install snort -y
curl "" >/lib/systemd/system/snort.service
