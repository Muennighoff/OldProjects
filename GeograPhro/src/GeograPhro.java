/* This is the game GeograPhro
    You will guess a country via Hangman with 10 tries and after successful completion you are asked
    for its capital. If you manage both you are a "GeograPhro".
 */
/* If you want to use the Program in here you need to resort the files and put them in the General 'GeograPhro' folder
from the production folder!
 */


import javax.sound.midi.SysexMessage;
import java.io.FileNotFoundException;
import java.util.Arrays;
import java.util.NoSuchElementException;
import java.util.Scanner;
import java.io.File;



public class GeograPhro {

    public static void main(String args[]) {

        Game game = new Game();
        game.myCountryCapitalArray();
        game.generate();
        game.introduction();
        game.inBetweenMessage();


    }

}

class Game{

        //Fields;

        // capitalAmount==countryAmount==cAmount
        private int cAmount;
        private File countryFile = new File("World Countries by Capitals.txt");
        private File capitalFile = new File("World Capitals Alphabetical.txt");
        private Scanner countryScanner;
        private Scanner capitalScanner;
        private String countryLine;
        private String capitalLine;
        private boolean canRead = countryFile.canRead();

    public boolean isCanRead() {
        return canRead;
    }

    // Get & Set Methods
        private String getCountryLine () {
            try {
                countryLine = countryScanner.nextLine();
            } catch (NullPointerException n) {
                System.out.println("NullpointerException at Line");
            }
            return countryLine;
        }
        private Scanner getCountryScanner () {
            try {
                countryScanner = new Scanner(countryFile);
            } catch (FileNotFoundException e) {
                System.out.println("Country-File not found");
            }
            return countryScanner;
        }
        private Scanner getCapitalScanner () {
        try {
            capitalScanner = new Scanner(capitalFile);
        } catch (FileNotFoundException e) {
            System.out.println("Capital-File not found");
        }
        return capitalScanner;
         }
        public int getcAmount () {
            return cAmount;
        }

        // Actual Methods

        public String[][]myCountryCapitalArray () {
            int size = 0;
            Scanner scannerCountry = getCountryScanner();
            Scanner scannerCapital = getCapitalScanner();
            String [] [] ccArray = new String[483][2];
            try {
                while (scannerCountry.hasNextLine() && scannerCapital.hasNextLine()) {
                    String country = scannerCountry.nextLine();
                    String capital = scannerCapital.nextLine();
                    try {
                        //System.out.println("HAEAEAEAEAEAE");
                        ccArray[size][0] = country;
                        //System.out.println("LALALALLALALA");
                        ccArray[size][1] = capital;
                        //System.out.println("HALLLOOO");
                        //System.out.println(ccArray[size][0]);
                        //System.out.println(ccArray[size][1]);
                    }
                    catch (IndexOutOfBoundsException e){

                        System.out.println("IndexOutOfBounds!!!!!!");
                    }
                    size++;
                   // System.out.println(country + " " + capital);
                    if (scannerCountry.hasNextLine() && scannerCapital.hasNextLine()) {
                        scannerCountry.nextLine();
                        scannerCapital.nextLine();
                    }
                    else {break;}
                }
            }
            catch(NoSuchElementException e){
                System.out.println("NoSuchElementException");
            }
                return ccArray;
        }


        public int generate () {
            String [] [] ccArray = myCountryCapitalArray();
            int cAmount = (int) ccArray.length/2 + 1;
            int countryNumber = (int) (Math.random() * (cAmount + 1));
            return countryNumber;
        }



        public void introduction(){
            System.out.println("Hey Geography Expert! I choose a random country / territory of planet earth. " +
                    "Try to guess it via Hangman.");
        }

        public String scan() {
            Scanner scanner = new Scanner(System.in);
            String letter = scanner.next();
            return letter;
        }
        public void inBetweenMessage() {

            int breakVariable = 0;
            //Array
            String [] [] ccArray = myCountryCapitalArray();
            int countryNumber = generate();
            String randomCountry = ccArray[countryNumber][0];
            // Country Encoded
            randomCountry = randomCountry.replaceFirst(" ", "");
            randomCountry = randomCountry.replaceFirst(" ", "");
            String randomCountryX = randomCountry.replaceAll(" ", "5");
            String MessageX = randomCountryX.replaceAll("\\D", "_ ");
            String Message = MessageX.replaceAll("\\d", "  ");
            System.out.println("This is the amount of letters the searched country contains. " +
                    "\nTry guess a letter and remember special letters may also be part of it.\n"
                    + Message);

            //System.out.println(randomCountry);

            // Check input with Country
            String randomCountryLowerCase = randomCountry.toLowerCase();
            int yy = 0;
            char[] randomCountryArray = randomCountryLowerCase.toCharArray();
            char[] MessageArray = Message.toCharArray();
            int jJ = 0;

            for (int tries = 10; tries > 0; tries--) {

                //System.out.println(ccArray[0][1]);

                System.out.println("You have " + tries + " tries left. Enter your guess.");
                String letter1 = scan();
                String letter = letter1.toLowerCase();
                int y = letter.length() - 1;

                if (randomCountryLowerCase.contains(letter)) {
                    for (int j = 0; j < randomCountry.length(); j++) {
                        if (letter.charAt(yy) == randomCountryLowerCase.charAt(j)) {

                            MessageArray[jJ] = letter.charAt(yy);

                            //System.out.println(randomCountryLowerCase.charAt(j));
                            if (yy < y) {
                                yy++;
                            }
                        }
                        int x = 0;
                        for (int z = 0; z < MessageArray.length; z++) {
                            if (MessageArray[z] != '_'){
                                x++;
                        }
                            if (MessageArray.length == x){
                                System.out.println(MessageArray);
                                System.out.println("Wow you are right! But are you a real pro???\n" +
                                        "Tell me " + randomCountry + "'s capital.");
                                String capital = ccArray[countryNumber][1];
                                //System.out.println(capital);
                                String capitalGuess = scan();
                                if (capitalGuess.toLowerCase().equals(capital.toLowerCase())){
                                    System.out.println("Incredible. Where did you study Geography???" +
                                            "\nCongratulations on winning!!!");
                                }
                                else {
                                    System.out.println("Well the actual capital is " + capital + " ;).");
                                    System.out.println("At least you tried... Game Over.");
                                }
                                breakVariable = 1;
                                break;



                            }
                        }
                       // while(MessageArray[j] == '_'){
                        //}
                        //if(x == 1){
                           // System.out.println("CONTAINNNNNNNNNNNS!!!");
                     //   }

                        //System.out.println(MessageArray[1-5]);
                        //if (MessageArray.equals(randomCountryArray)) {
                        //    System.out.println("YOU WON");
                       // }

                        if (breakVariable == 1){
                            break;
                        }
                        jJ = jJ + 2;
                    }
                    jJ = 0;
                    yy = 0;
                }
                if (breakVariable == 1){
                    break;
                }
                //if (Arrays.asList(MessageArray).contains("_")) {
                 //   System.out.println("CONTAINS");
                // }
                System.out.println(MessageArray);
                //String MessageArrayX = MessageArray.toString();
                //System.out.println(MessageArrayX);
                //if (!MessageArrayX.contains("_")){
                //   System.out.println("YOU WON");
                //  }
                if (tries == 1){
                    System.out.println("Good effort...The word was " + randomCountry + "\nYou lost.");
                }

        }

                   /* Message = randomCountryLowerCase.replaceAll("[^" + letter + "]*", "_ ");
                    System.out.println(Message);
                    System.out.println("Good Guess");
                }
                else {
                    System.out.println(Message);
                }
                */



        }


}

/* Still To do!!!:
    Problems with directly typing in Country names with spaces
    Capitals!!
 */
