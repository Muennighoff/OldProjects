
import java.util.Scanner;
import java.io.File;



public class CountTheWords {



    public static void main(String [] args) throws Exception {

        File file = new File("ESCPCountWords.txt");
        Scanner scanner = new Scanner(file);
        int words = 0;

        while(scanner.hasNext()){
            String line = scanner.nextLine();
            words += line.split(" ").length;
        }

    System.out.println("The " + file + " has " + words + " words.");
    }
}
