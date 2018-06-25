Data Types are int, boolean, and char           Variables are used to store values

Whitespace helps make code easy to read for you and others   Comments describe code and its purpose

Arithmetic Operators include +, -, *, /, and %    Relational Operators include <, <=, >, and >=

Equality Operators include == and !=

The precedence of each Boolean operator is as follows:

! is evaluated first
&& is evaluated second
|| is evaluated third


-------------------------- Création d''une CLASS

public class Dog {

	int age;
	//constructeur (du même nom de la classe)
	public Dog(int dogsAge) {
		age = dogsAge;
	}

//ou
	public Dog(int age) {
		this.age = age;
	}

	public static void main(String[] args) {

	}
}

//le constructeur n'est pas obligatoire, par défaut toutes les classes extends d'un objet 

Dog toto = new Dog();
//Dog = la classe      new Dog = le constructeur


Class: a blueprint for how a data structure should function

Constructor: instructs the class to set up the initial state of an object

Object: instance of a class that stores the state of a class

Method: set of instructions that can be called on an object

Parameter: values that can be specified when creating an object or calling a method

Return value: specifies the data type that a method will return after it runs

Inheritance: allows one class to use functionality defined in another class

------------------------------- SCANNER

//Pour saisir des données dans le terminal et s'en servir par la suite via des variables, on utilise la class SCANNER
on ouvre alors un scanner via la création d''un nouvel objet et l''initialisation via l''entrée standard System.in
                 Scanner varScanner = new Scanner(System.in);

et on le referme par :
                 varScanner.close();

à l''intérieur on met tout les inputs dont a besoin et il y a une méthode de récupération de données pour chaque type

exemples :

import java.util.Scanner;

public class Main {

    /**
     *
     * @param args
     */
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        System.out.println("Quel est votre nom ? "); // ask question in the terminal
        String inputLastname = scanner.next();

        System.out.println("Quel est votre prénom ? "); // ask question in the terminal
        String inputFirstname = scanner.next(); // record string

        System.out.println("Quel est votre chiffre favori ? "); // ask question in the terminal
        int inputInteger = scanner.nextInt(); // record integer

        System.out.println("Votre chiffre favori est : " + inputInteger); // display the value of the input

        scanner.close();


        Person p = new Person(); //create a new object Person and put it into the variable p
        p.setLastname(inputLastname); // set the lastname
        p.setFirstname(inputFirstname); // set the firstname
        System.out.println(p.getFullName()); // display the object p with its attributes
    }
}

---------------------------- COMPARAISON

String reponse = "yes";
si je compare : "yes" == "yes"  j''ai false car il s''agit de 2 objets String qui n''ont pas le même ID
Pour comparer 2 Strings on utilise la methode 
											.equals();

Pour le reste, les types primitifs peuvent se comparer entre eux

boolean true == true // true
int 1 == 1 // true
char 'O' == 'O' // true

---------------------------TABLEAUX

<type du tableau> <nom du tableau> [] = { <contenu du tableau>};

int tableauEntier[] = {0,1,2,3,4,5,6,7,8,9};
double tableauDouble[] = {0.0,1.0,2.0,3.0,4.0,5.0,6.0,7.0,8.0,9.0};
char tableauCaractere[] = {'a','b','c','d','e','f','g'};
String tableauChaine[] = {"chaine1", "chaine2", "chaine3" , "chaine4"};

Attention, si déclaration d''un tableau vide, celui-ci devra impérativement contenir un nombre de cases bien défini !

TABLEAU MUTIDIMENSIONNEL

int premiersNombres[][] = { {0,2,4,6,8},{1,3,5,7,9} };

CHERCHER À L''INTÉRIEUR:
System.out.println(tableauCaractere[0]); // 1er élément du tableau ci dessus donc => 'a' 

exemple:

char tableauCaractere[] = {'a','b','c','d','e','f','g'};
       
for(int i = 0; i < tableauCaractere.length; i++)
{
  System.out.println("À l'emplacement " + i +" du tableau nous avons = " + tableauCaractere[i]);
}

---------recherche dans un tableau avec condition et vérif saisie

char tableauCaractere[] = {'a', 'b', 'c', 'd', 'e', 'f', 'g'};
int i = 0;
char reponse = ' ', carac = ' ';
Scanner sc = new Scanner(System.in);
         
do {//Boucle principale
    do {//On répète cette boucle tant que l'utilisateur n'a pas rentré une lettre figurant dans le tableau
	    i = 0;
	    System.out.println("Rentrez une lettre en minuscule, SVP ");
	                
	    carac = sc.nextLine().charAt(0); // on stocke la saisie du caractère

    //Boucle de recherche dans le tableau
    while(i < tableauCaractere.length && carac != tableauCaractere[i])
		i++;
         
    	//Si i < 7 c'est que la boucle n'a pas dépassé le nombre de cases du tableau 
	    if (i < tableauCaractere.length)
	      System.out.println(" La lettre " +carac+ " se trouve bien dans le tableau !");
	    else //Sinon
	      System.out.println(" La lettre " +carac+ " ne se trouve pas dans le tableau !");
    }

    while(i >= tableauCaractere.length);

  //Tant que la lettre de l'utilisateur ne correspond pas à une lettre du tableau    
    do {
	System.out.println("Voulez-vous essayer à nouveau ? (O/N)");
	reponse = sc.nextLine().charAt(0);
	}
	while(reponse != 'N' && reponse != 'O');

} while (reponse == 'O');
                
System.out.println("Au revoir !");


______________________________________COLLECTIONS (objet) & MAP (couple Clé-Valeur)

------------------------------------------INTERACE LIST / MAP (implémentations ArrayList  et HashMap )
ARRAYLIST :

add() permet d''ajouter un élément ;

get(int index) retourne l''élément à l''indice demandé ;

remove(int index) efface l''entrée à l''indice demandé ;

isEmpty() renvoie « vrai » si l''objet est vide ;

removeAll() efface tout le contenu de l''objet ;

contains(Object element) retourne « vrai » si l''élément passé en paramètre est dans l''ArrayList.



exemple:

import java.util.*;

public class Olympics {

  public static void main(String[] args) {

    //Some Olympic sports 

    ArrayList<String> olympicSports = new ArrayList<String>();
    olympicSports.add("Archery");
    olympicSports.add("Boxing");
    olympicSports.add("Cricket");
    olympicSports.add("Diving");

    System.out.println("There are " + olympicSports.size() + " Olympic sports in this list. They are: ");

    for (String sport: olympicSports) { // FOREACH = concise version of a for loop
      System.out.println(sport);
    }

    //Host cities and the year they hosted the summer Olympics

    HashMap<String, Integer> hostCities = new HashMap<String, Integer>();

    hostCities.put("Beijing", 2008);
    hostCities.put("London", 2012);
    hostCities.put("Rio de Janeiro", 2016);

    for (String city: hostCities.keySet()) {
      
      if (hostCities.get(city) < 2016) {

        System.out.println(city + " hosted the summer Olympics in " + hostCities.get(city) + ".");

      } else {

        System.out.println(city + " will host the summer Olympics in " + hostCities.get(city) + ".");

      }
    }

  }

}

For Loops: used to repeatedly run a block of code
For Each Loops: a concise version of a for loop
ArrayList: stores a list of data
HashMap: stores keys and associated values like a dictionary

------------------------------------------INTERFACE SET ( implémentation HashSet + Iterator )

import java.util.HashSet;
import java.util.Iterator;
 
public class Test { 
  public static void main(String[] args) {         
    HashSet hs = new HashSet();
    hs.add("toto");
    hs.add(12);
    hs.add('d');

    Iterator it = hs.iterator();
    while(it.hasNext())
      System.out.println(it.next());
 
    System.out.println("\nParcours avec un tableau d'objet");
    System.out.println("-----------------------------------");
                
    Object[] obj = hs.toArray();
    for(Object o : obj)
      System.out.println(o);                
  }
}


HASHSET:

add() ajoute un élément ;

contains(Object value) retourne « vrai » si l''objet contient value ;

isEmpty() retourne « vrai » si l''objet est vide ;

iterator() renvoie un objet de type Iterator ;

remove(Object o) retire l''objet o de la collection ;

toArray() retourne un tableau d''Object.