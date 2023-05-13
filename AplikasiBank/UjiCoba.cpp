#include<iostream>
#include<fstream>
#include<unistd.h>
using namespace std;

// Struct Data
struct dataPengguna{
	string nama;
	int noKTP, noHP, Pin, noRek;
	double saldo;
};

// Variabel Global
dataPengguna p;
int pilihan;

void welcome();
void menu();
void rekeningBaru();
void transaksi();
void valueTransaksi(int pin, int noRek);
void cekSaldo(int noRek);
int searchSaldo(dataPengguna arr[], int n, int x);
void setorTunai(int pin, int noRek);
void tarikTunai(int pin, int noRek);
void transfer(int pin, int noRek);
void antarBank(int pin, int noRek);
void bedaBank(int pin, int noRek);
void tentangkami();
void dataFinish();
void akhir();
void quit();

// Fungsi Utama
int main(){
	welcome();
	menu();
}

// Tampilan Awal
void welcome(){
	cout<<"========================================"<<endl<<endl;
	cout<<"     SELAMAT DATANG DI BANK WAKANDA     "<<endl<<endl;
	cout<<"========================================"<<endl;
	
	sleep(3);
}

// Tampilan Menu Utama
void menu(){
	system("cls");
	cout<<"+-----------------------------------+"<<endl;
	cout<<"|=========== Menu Utama ============|"<<endl;
	cout<<"|                                   |"<<endl;
	cout<<"|    1. Buka Rekening Baru          |"<<endl;
	cout<<"|    2. Transaksi                   |"<<endl;
	cout<<"|    3. Tentang Kami                |"<<endl;
	cout<<"|    0. Keluar Aplikasi             |"<<endl;
	cout<<"|                                   |"<<endl;
	cout<<"+-----------------------------------+"<<endl;

	cout<<"     Pilihan Anda : "; cin>>pilihan;
	
	switch(pilihan){
		case 1: rekeningBaru(); break;
		case 2: transaksi(); break;
		case 3: tentangkami(); break;
		default: quit();
	}
}

// Pembuatan Rekening Baru
void rekeningBaru(){
	fstream myDb;
	myDb.open("dataPelanggan.txt", ios::app);
	cin.ignore();
	system("cls");
	
	cout<<"====================== Bank Wakanda ======================"<<endl;
	cout<<"Masukkan Nama                           : "; getline(cin,p.nama);
	cout<<"Masukkan No KTP                         : "; cin>>p.noKTP;
	cout<<"Masukkan No Hp                          : "; cin>>p.noHP;
	cout<<"Buat No Rekening(sesuai keinginan)      : "; cin>>p.noRek;
	cout<<"Buat No PIN                             : "; cin>>p.Pin;

	p.saldo=100000;
	myDb<<p.nama<<endl;
	myDb<<p.noKTP<<endl;
	myDb<<p.noHP<<endl;
	myDb<<p.noRek<<endl;
	myDb<<p.Pin<<endl<<endl;
	myDb.close();

	fstream mySaldo;
	mySaldo.open("bookSaldo.txt", ios::app);
	
	mySaldo<<p.noRek<<endl;
	mySaldo<<p.Pin<<endl;
	mySaldo<<p.saldo<<endl<<endl;
	
	mySaldo.close();
	dataFinish();
}

// Validasi Data Pengguna
int search(dataPengguna arr[], int n, int x){
	int i;
	for (i=0; i<n; i++)
		if (arr[i].noRek == x)
			return i;
		return -1;	
}	

int searchPin(dataPengguna arr[], int n, int x, int i){
		if (arr[i].Pin == x)
			return 1;
	return 0;		
}

// Validasi Menu Transaksi
void transaksi(){
	ifstream readFile("dataPelanggan.txt");
	dataPengguna a[3];
	int pin, noRek;
	system("cls");
	
	cout<<"=========== Bank Wakanda ============"<<endl;
	cout<<"Masukkan No Rekening    : "; cin>>noRek;
	cout<<"Masukkan No Pin         : "; cin>>pin;
	
	int b=0;
	while (b<2){
		while(!readFile.eof()){
			readFile>>a[b].nama;
			readFile>>a[b].noKTP;
			readFile>>a[b].noHP;
			readFile>>a[b].noRek;
			readFile>>a[b].Pin;
			b++;
		}
	}
	
	string ketRek, KetPin;
			
	int n = sizeof(a)/sizeof(a[0]);
	int result = search(a, n, noRek);
	(result != -1)? ketRek="true": ketRek="false";
	
	int resultPin = searchPin(a, n, pin, result);
	(resultPin == 1)? KetPin="true": KetPin="false";
		if(ketRek=="true" && KetPin=="true"){
			valueTransaksi(pin, noRek);
    	} else {
  	    	cout<<"\n\n MOHON PERIKSA KEMBALI NO REKENING DAN PIN ANDA!!!"; sleep(3); 
			transaksi();
    	}

	readFile.close();
}

// Menu Transaksi
void valueTransaksi(int pin, int noRek){
	system("cls");
	cout<<"+-----------------------------------+"<<endl;
	cout<<"|========== Bank Wakanda ===========|"<<endl;
	cout<<"|    1. Cek Saldo                   |"<<endl;
	cout<<"|    2. Setor Tunai                 |"<<endl;
	cout<<"|    3. Tarik Tunai                 |"<<endl;
	cout<<"|    4. Transfer                    |"<<endl;
	cout<<"|    0. Keluar Aplikasi             |"<<endl;
	cout<<"+-----------------------------------+"<<endl<<endl;
	
	cout<<"Pilih Transaksi: "; cin>>pilihan;
	
	switch (pilihan){
		case 1: cekSaldo(noRek); break;
		case 2: setorTunai(pin, noRek); break;
		case 3: tarikTunai(pin, noRek); break;
		case 4: transfer(pin, noRek); break;
		default: quit(); break;
	}
}

// Cek Saldo
void cekSaldo(int noRek){
	dataPengguna c[3];
	system("cls");
	fstream mySaldo;
	mySaldo.open("bookSaldo.txt");
		
	int b=0;
	while (b<2){
		while(!mySaldo.eof()){
				mySaldo>>c[b].noRek;
				mySaldo>>c[b].Pin;
				mySaldo>>c[b].saldo;
			b++;
		}
	}
	
	int n = sizeof(c)/sizeof(c[0]);
	int resultSaldo = searchSaldo(c, n, noRek);
	
	cout<<"Info Saldo"<<endl;
	cout<<"No Rekening   : "<<noRek<<endl;
	cout<<"Saldo Anda    : Rp "<<c[resultSaldo].saldo<<".00"<<endl;
	
	cin.ignore();
	cout<<"Saldo Anda: "<<endl;
	
	akhir();
}

// Mencari Saldo
int searchSaldo(dataPengguna arr[], int n, int x){
	for (int i=0; i<n; i++)
		if (arr[i].noRek == x)
			return i;
	return -1;		
}

// Setor Tunai
void setorTunai(int pin, int noRek){
	system("cls");
	dataPengguna d[3];
	double saldo;
	fstream readSaldo;
	readSaldo.open("bookSaldo.txt", ios::in | ios::out);
	
	cout<<"======================= Bank Wakanda ======================="<<endl;
	cout<<"Masukkan Nominal Saldo Yang Ingin Disetor (Rp): "; cin>>saldo;
	
	int b=0;
	while (b<2){
		while(!readSaldo.eof()){
			readSaldo>>d[b].noRek;
			readSaldo>>d[b].Pin;
			readSaldo>>d[b].saldo;
			b++;
		}
	}
	
	int n = sizeof(d)/sizeof(d[0]);
	int resultSaldo = searchSaldo(d, n, noRek);
	
	if(pin == d[resultSaldo].Pin && noRek == d[resultSaldo].noRek){
		d[resultSaldo].saldo = d[resultSaldo].saldo + saldo;
    }
    
    readSaldo.close();	
    
    ofstream mySaldo("bookSaldo.txt");
    for(int a=0; a<2; a++){
    	mySaldo<<d[a].noRek<<endl;
		mySaldo<<d[a].Pin<<endl;
		mySaldo<<d[a].saldo<<endl<<endl;

		cout<<d[a].noRek<<endl;
		cout<<d[a].Pin<<endl;
		cout<<d[a].saldo<<endl;
	}	
	
	mySaldo.close();
		
	system("cls");
	cout<<"========= INFO SALDO ========="<<endl;
	cout<<"No.Rekening Anda   :"<<d[resultSaldo].noRek<<endl;
	cout<<"Saldo              :"<<d[resultSaldo].saldo<<endl<<endl;
	
	akhir();
}

// Tampilan Tarik Tunai
void tarikTunai(int pin, int noRek){
	system("cls");
	dataPengguna d[3];
	double saldo;
	fstream readSaldo;
	readSaldo.open("bookSaldo.txt", ios::in | ios::out);
	
	cout<<"======================= Bank Wakanda ======================="<<endl;
	cout<<"Masukkan Nominal Saldo Yang Ingin Ditarik (Rp): "; cin>>saldo;
	
	int b=0;
	while (b<2){
		while(!readSaldo.eof()){
				readSaldo>>d[b].noRek;
				readSaldo>>d[b].Pin;
				readSaldo>>d[b].saldo;
			b++;
		}
	}
	
	int n = sizeof(d)/sizeof(d[0]);
	int resultSaldo = searchSaldo(d, n, noRek);
	readSaldo.close();
	
	if(pin == d[resultSaldo].Pin && noRek == d[resultSaldo].noRek){
		if(saldo < d[resultSaldo].saldo){
			d[resultSaldo].saldo = d[resultSaldo].saldo - saldo;
			ofstream mySaldo("bookSaldo.txt");
		    for(int a=0; a<2; a++){
		    	mySaldo<<d[a].noRek<<endl;
				mySaldo<<d[a].Pin<<endl;
				mySaldo<<d[a].saldo<<endl<<endl;
		
			cout<<d[a].noRek<<endl;
			cout<<d[a].Pin<<endl;
			cout<<d[a].saldo<<endl;
			}	
			
			mySaldo.close();
				
			system("cls");
			cout<<"========= INFO SALDO ========="<<endl;
			cout<<"No.Rekening Anda   :"<<d[resultSaldo].noRek<<endl;
			cout<<"Sisa Saldo         :"<<d[resultSaldo].saldo<<endl<<endl;
			
			akhir();
		} else if (saldo > d[resultSaldo].saldo){
			cout<<"+---------------------------------------------+"<<endl;
			cout<<"|Jumlah Yang Ingin Ditarik Melebihi Saldo Anda|"<<endl;
			cout<<"+---------------------------------------------+"<<endl<<endl;
			akhir();
		} 
    } else {
    	cout<<"Ada Error"<<endl;
    	akhir();
	} 
}

// Menu Transfer
void transfer(int pin, int noRek){
	system("cls");
	cout<<"+-----------------------------------+"<<endl;
	cout<<"|========== Bank Wakanda ===========|"<<endl;
	cout<<"|    1. Antar Bank                  |"<<endl;
	cout<<"|    2. Bank Lain                   |"<<endl;
	cout<<"|    0. Keluar aplikasi             |"<<endl;
	cout<<"+-----------------------------------+"<<endl<<endl;
	
	cout<<"Pilih Transaksi: "; cin>>pilihan;
	
	switch (pilihan){
		case 1: antarBank(pin, noRek); break;
		case 2: bedaBank(pin, noRek); break;
		default: quit(); break;
	}
}

// Transfer Antar Bank
void antarBank(int pin, int noRek){
	system("cls");
	dataPengguna d[3];
	int rektujuan;
	double saldo;
	fstream readSaldo;
	readSaldo.open("bookSaldo.txt", ios::in | ios::out);
	
	cout<<"======================= Bank Wakanda ======================="<<endl;
	cout<<"Masukkan Nomor Rekening Pengguna                  : "; cin>>rektujuan;
	cout<<"Masukkan Nominal Saldo Yang Ingin Ditransfer (Rp) : "; cin>>saldo;
	
	int b=0;
	while (b<2){
		while(!readSaldo.eof()){
			readSaldo>>d[b].noRek;
			readSaldo>>d[b].Pin;
			readSaldo>>d[b].saldo;
			b++;
		}
	}
	int n = sizeof(d)/sizeof(d[0]);
	int resultSaldo = searchSaldo(d, n, noRek);
	if (saldo<d[resultSaldo].saldo){
		    int resultSaldoTF = searchSaldo(d, n, rektujuan);
		    if(resultSaldoTF==-1){
		    	system("cls");
		    	cout<<"================ Bank Wakanda ================"<<endl;
		    	cout<<"Nomor Rekening Tidak Ditemukan"<<endl;
		    	akhir();
			} else{	
	if( pin == d[resultSaldo].Pin && noRek == d[resultSaldo].noRek){
		d[resultSaldo].saldo = d[resultSaldo].saldo - saldo;
    } 
    
    if(rektujuan == d[resultSaldoTF].noRek){
		d[resultSaldoTF].saldo = d[resultSaldoTF].saldo + saldo;
    } 
    
    readSaldo.close();
    
    ifstream readFile("dataPelanggan.txt");
	dataPengguna a[3];
	
	int c=0;
		while (c<2){
			while(!readFile.eof()){
				readFile>>a[c].nama;
				readFile>>a[c].noKTP;
				readFile>>a[c].noHP;
				readFile>>a[c].noRek;
				readFile>>a[c].Pin;
				c++;
			}
		}
		
	int q = sizeof(a)/sizeof(a[0]);
	int resultNama = search(a, q, rektujuan);
	
	string nama = a[resultNama].nama;
	readFile.close();
    
    ofstream mySaldo("bookSaldo.txt");
    for(int a=0; a<2; a++){
    	mySaldo<<d[a].noRek<<endl;
		mySaldo<<d[a].Pin<<endl;
		mySaldo<<d[a].saldo<<endl<<endl;

		cout<<d[a].noRek<<endl;
		cout<<d[a].Pin<<endl;
		cout<<d[a].saldo<<endl;
	}	
	
	mySaldo.close();
	
	system("cls");
	cout<<"======= INFO TRANSFER ========"<<endl;
	cout<<"No. Tujuan         : "<<rektujuan<<endl;
	cout<<"Nama Tujuan        : "<<nama<<endl;
	cout<<"Nominal            : "<<saldo<<endl<<endl;
	
	akhir();
	}
	}else{
		system("cls");
		cout<<"================ Bank Wakanda ================"<<endl;
		cout<<"Saldo Anda Tidak Mencukupi, Mohon Setor Tunai"<<endl;
		akhir();
	}
}


// Transfer Beda Bank
void bedaBank(int pin, int noRek){
	system("cls");
	dataPengguna d[3];
	string namaBank, namaPengguna;
	int rektujuan;
	double saldo;
	fstream readSaldo;
	readSaldo.open("bookSaldo.txt", ios::in | ios::out);
	
	cout<<"======================= Bank Wakanda ======================="<<endl;
	cout<<"Masukkan Nama Bank Tujuan                         : "; cin>>namaBank;
	cin.ignore();
	cout<<"Masukkan Nama Pengguna                            : "; getline(cin,namaPengguna);
	cout<<"Masukkan Nomor Rekening Pengguna                  : "; cin>>rektujuan;
	cout<<"Masukkan Nominal Saldo Yang Ingin Ditransfer (Rp) : "; cin>>saldo;
	
	int b=0;
	while (b<2){
		while(!readSaldo.eof()){
			readSaldo>>d[b].noRek;
			readSaldo>>d[b].Pin;
			readSaldo>>d[b].saldo;
			b++;
		}
	}
	
	int n = sizeof(d)/sizeof(d[0]);
	int resultSaldo = searchSaldo(d, n, noRek);
	
	if(saldo<d[resultSaldo].saldo){
	if( pin == d[resultSaldo].Pin && noRek == d[resultSaldo].noRek){
		d[resultSaldo].saldo = d[resultSaldo].saldo - saldo;
    } 
    
    readSaldo.close();	
    
    ofstream mySaldo("bookSaldo.txt");
    for(int a=0; a<2; a++){
    	mySaldo<<d[a].noRek<<endl;
		mySaldo<<d[a].Pin<<endl;
		mySaldo<<d[a].saldo<<endl<<endl;

		cout<<d[a].noRek<<endl;
		cout<<d[a].Pin<<endl;
		cout<<d[a].saldo<<endl;
	}	
	
	mySaldo.close();
		
	system("cls");
	cout<<"======= INFO TRANSFER ========"<<endl;
	cout<<"Bank Tujuan        : "<<namaBank<<endl;
	cout<<"Nama Tujuan        : "<<namaPengguna<<endl;
	cout<<"No tujuan          : "<<rektujuan<<endl;
	cout<<"Nominal            : "<<saldo<<endl<<endl;
	
	akhir();
	} else{
		system("cls");
		cout<<"================ Bank Wakanda ================"<<endl;
		cout<<"Saldo Anda Tidak Mencukupi, Mohon Setor Tunai"<<endl;
		akhir();
	}
}

// Tampilan Tentang Kami
void tentangkami(){
	system("cls");
	cout<<"+----------------------------------------------------------------------------------------+"<<endl;
	cout<<"|===================================== Tentang Kami ======================================|"<<endl;
	cout<<"|   Wakanda Bank adalah sebuah bisnis yang bergerak di bidang finansial ataupun ekonomi   |"<<endl;
	cout<<"|  yang cocok juga untuk kamu bagi kaum kaula muda. Dilandasi oleh aturan untuk menjaga   |"<<endl;
	cout<<"|  keamanan keuangan para pengguna kami dan membantu mereka dalam memudahkan bertransaksi |"<<endl;
	cout<<"|         di mana pun dan kapan pun. Masih banyak profit yang bisa kamu dapatkan.         |"<<endl;
	cout<<"|                          Mari bergabung bersama Wakanda Bank                            |"<<endl;
	cout<<"+-----------------------------------------------------------------------------------------+"<<endl<<endl;
	
	cout<<"[1]Kembali Ke Tampilan Awal"<<endl;
	cout<<"[0]Keluar Aplikasi"<<endl;
	
	cout<<"Masukkan Pilihan : "; cin>>pilihan;
	
	switch(pilihan){
		case 1 : menu(); break;
		default : quit();
	}
}

// Tampilan Data Berhasil Diinput
void dataFinish(){
	system("cls");
	int a;
	cout<<"======================================================"<<endl<<endl;
	cout<<"           Data Anda Telah Berhasil Diinput"<<endl<<endl;
	cout<<"======================================================"<<endl;
	cout<<"[1]Kembali Ke Tampilan Awal"<<endl;
	cout<<"[2]Buat Akun Lagi"<<endl;
	cout<<"[3]Lakukan Transaksi"<<endl;
	cout<<"[0]Keluar Aplikasi"<<endl;
	cout<<"Masukkan Angka : "; cin>>pilihan;
	
	switch(pilihan){
		case 1 : menu(); break;
		case 2 : rekeningBaru(); break;
		case 3 : transaksi();break;
		default : quit(); break;
	}
}

// Setelah Melakukan Tindakan
void akhir(){
	cout<<"=============================="<<endl;
	cout<<"1. Melakukan Transaksi Kembali"<<endl;
	cout<<"2. Keluar Aplikasi"<<endl;
	cout<<"Masukkan Pilihan: "; cin>>pilihan;
	
	if(pilihan == 1){
		transaksi();
	} else if(pilihan == 2){
		quit();
	}
}

// Keluar Aplikasi
void quit(){
	system("cls");
	cout<<"+-----------------------------------+"<<endl;
	cout<<"|                                   |"<<endl;
	cout<<"|           Terima Kasih            |"<<endl;
	cout<<"|           Bank Wakanda            |"<<endl;
	cout<<"|                                   |"<<endl;
	cout<<"+-----------------------------------+"<<endl;
	cin.ignore();
}
