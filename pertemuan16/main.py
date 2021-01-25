tambahuang = 0
ambiluang = 0

print("ini adalah bank")

while True:
  print("pilih menu")
  saldo = 0
  print('Saldo Anda :',saldo)
  print("1.Menabung")
  print("2.ambil uang")
  menu = int(input("Pilih menu (1 untuk tabung, 2 untuk ambil uang): "))
  saldo = 0
  if menu == 1:
    print("masukan jumlah uang yang akan ditabung")
    tambahuang = int(input(""))
    saldo = saldo + tambahuang
  elif menu == 2:
    if saldo < 0:
      print('tidak bisa ambil uang')
    elif saldo > 0:
      print("masukan jumlah uang yang akan diambil")
      ambiluang = int(input(""))
      saldo = saldo - ambiluang

  

  
