


public class BankManager {


    public static void main(String[] args) {
        CertificateOfDeposit Cashflow = new CertificateOfDeposit();
        CheckingsAccount Chekingflow = new CheckingsAccount();
        Chekingflow.setBalance(20);
        Cashflow.setBalance(5000);
        System.out.println(Cashflow.setBalance(4000));



    }




    // Fields
    private double balance = 10000;
    private String accountName;

    // Set & Get

    public double setBalance(double newBalance) {
        double balance = newBalance;
        return balance;
    }

    class XXX extends BankManager{

    }

}

class CheckingsAccount extends BankManager {

    private int limit;
}
class SavingsAccount extends CheckingsAccount {

}
class CertificateOfDeposit extends CheckingsAccount{

}