http://webforce3.altervista.org/wiki/index.php?title=Memo_POO

Avantages de la POO
-Réutilisation du code dans différents projets;
-Conception plus claire et organisée. Chaque partie du code devient un objet avec un contexte, des propriétés et des actions spécifiques (« Tout est objet » et « 1 classe = 1 rôle »);
-La POO s'inspire du monde réel pour la description des objets (caractéristiques, fonctions, héritage), ce qui facilite l'apprentissage de la logique objet (Exemple des animaux, véhicules..etc);
-Combinée avec les exceptions, elle améliore et centralise la gestion des erreurs et le debug;
-Elle permet de faire du code modulaire afin de travailler facilement en équipe;
-Elle permet de masquer la complexité, les objets créés sont généralement simples à utiliser. Sur des gros projets complexes, certains devs conçoivent les objets, d'autres devs les utilisent;
-Permet d'aller plus loin en utilisant les design patterns pour améliorer encore la qualité et la structuration du code;

Bonnes pratiques de la POO
-Un fichier par classe
-Les attributs et les méthodes private/protected sont précédés d'un underscore pour mieux les repérer.
-Toutes les méthodes magiques sont préfixées par deux underscores et ont une visibilité public.


<?php

// Un objet est défini par une classe

class MonObjet {
	// on peut définir des attributs à cet objet
	public $attribut_1 = 'monNom';

	// on peut définir des méthodes à cet objet
	public function afficher()
	{
		// en faisant appel à $this on appelle l'objet créé
		echo $this->$attribut_1;
		// ça nous affiche "monNom"
	}
}
// une fois en dehors de la classe

	// on crée une nouvelle instance de l'objet (exemple Class Humain, instance homme, instance femme)
	$var = new MonObjet();

	// si on veut afficher cette nouvelle variable, on lui applique la méthode 'afficher'
	$var->afficher();

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// il existe plusieurs types de visibilité des attributs et méthodes de l'objet

/// public => visible depuis l'extérieur de la classe
	public $var_1 = "variable publique";
/// private => visible uniquement dans la classe
	private $_var_2 = "variable privée";
/// protected => visible de l'exterieur mais seulement lors de l'héritage (notion de parent et fille)
	protected $_var_3 = "variable protégée";

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Si besoin on peut utiliser des déclarations STATIQUES
// On ne peut pas accéder à des propriétés statiques en utilisant l'opérateur -> ni le mot clé $this, on y accède à l’intérieur de la classe avec self::, et depuis l'extérieur de la classe avec NomDeLaClasse:: /!\ pour les proprietés statiques on met le $ devant la variable !!!
class MaClass {
	static $var = 'attribut statique';

	static function uneMethode() 
	{
		return self::$var;
		// ici on utilise self quand on fait référence à la classe elle-même
	}
}

// utilisation de la class sans instanciation d'objet en utilisant directement le nom de la classe
echo maClass::$var;

echo maclasse::uneMethode();

// un exemple concret :

class Welcome {
 
    public static $hello = 'Hello';
 
    public static function saySomething($text) {
        echo $text;
    }
 
    public function sayBonjour() {
        self::saySomething('Bonjour'); // On appelle une méthode statique à l'intérieur de la classe avec self::
    }
 
    public function sayHello() {
        echo self::$hello.' !'; // On accède à une proprieté statique à l'intérieur de la classe avec self::
    }
}
 
// On appelle la méthode sayHello sans instancier la classe Welcome
Welcome::saySomething('Hello World !'); // Affiche Hello World !
 
$welcome = new Welcome();
$welcome->sayBonjour(); // Affiche Bonjour
echo $welcome->hello; // Affiche une erreur car la proprieté $hello est statique et doit donc être appelée avec ::
echo Welcome::$hello; // Affiche Hello
 
Welcome::sayHello(); // Affiche Hello !

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Lors de la création d'un objet on peut lui appliquer toutes les méthodes que l'on veut directement en utilisant un CONSTRUCT (méthodes "magiques")
class maClass {
	public function __construct($param)
	{

	}
}

// idem avec un DESTRUCT
class maClass {
	public function __destruct($param)
	{

	}
}

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// L'héritage est un principe de la POO qui permet d'étendre les caractéristiques/méthodes d'une classe parente dans une classe enfant. La classe enfant peut ainsi bénéficier de tous les comportements de la classe héritée, tout en redéfinissant ses comportements spécifiques. On parle de relation mère/fille ou parent/enfant.
// Lorsque vous étendez une classe, la classe fille hérite de tous les attributs et méthodes publiques et protégées de la classe parente. Tant que la classe fille n'écrase pas ces méthodes, elles conservent leur fonctionnalité d'origine.

// une classe peut HERITER d'une autre, elle devient fille de son parent via extends
class Parent {

	protected function call($name)
	{
		$name = $this->name = "Parent";
		echo $name;
	}
}

class Fille extends Parent {
	public function call($name){ // si on réécrit la méthode, cela devient celle qui sera valable et c'est la SURCHARGE de méthode
		return "toto";
	}
;}

// utilisation d'une classe générale parent, /!\ impossible à utiliser, via ABSTRACT
abstract class Vehicule {

}
class Voiture extends Vehicule {

}
class Moto extends Vehicule {

}
class Citroen extends Voiture {

}

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Getters & Setters (méthodes MAGIQUES)
// On peut créer des méthodes/fonctions pour définir et récupérer les valeurs des attributs d'une classe.

// Cela permet de contrôler les valeurs qui sont affectées aux attributs (setters) et de mettre en forme la valeur d'un attribut avant de la retourner (getters).

// En combinaison avec la visibilité private sur les attributs, on empêche d'affecter directement une valeur à un attribut, et on oblige à utiliser les setters.

// SETTERS
// on peut définir des setters pour définir des attributs à une instance
class maClass {
// on met en place une variable
	public $attribut;
// on met en place un Setter qui assignera des attributs à l'objet
	public function setAttribut($param)
	{
		$this->attribut = $param;
	}
// on met en place un Getter pour récupérer l'attribut
	public function getAttribut()
	{
		return $this->attribut;
	}
}

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Les méthodes MAGIQUES

__construct() // => Appelée dans la classe chaque fois qu'une nouvelle instance de la classe est créée. Elle reçoit tous les arguments passés à l'instance


__destruct()  // => Appelée à la fin de l’exécution du code de la classe.

__set()  // => Déclenchée lors de l'accès en écriture à un attribut de l'objet

__get()  // => Déclenchée lors de l'accès en lecture à une propriété de l'objet


__call()  // => Déclenchée lors de l'appel à une méthode non statique (c.f. Statique) inexistante de la classe

class Animal {}
$animal->test('bla'); // Appelle __call('test', 'bla') car la méthode test n'existe pas dans la classe
//Si on ne définie pas le comportement de __call dans la classe, une erreur fatale du type "Call to undefined method" va être lancée.
 
//Exemple de définition de __call :
public function __call($method, $arguments) {
      echo 'La méthode '.$method.' inexistante a été appelée avec les arguments : '.print_r($arguments, true);
}


// Il existe d'autres méthodes magiques :

// __isset() : Déclenchée si on applique isset() à une propriété de l'objet
// __unset() : Déclenchée si on applique unset() à une propriété de l'objet
// __sleep() : Exécutée si la fonction serialize() est appliquée à l'objet
// __wakeup() : Exécutée si la fonction unserialize() est appliquée à l'objet
// __toString() : Appelée lorsque l'on essaie d'afficher directement l'objet : echo $object;
// __set_state() : Méthode statique lancée lorsque l'on applique la fonction var_export() à l'objet
// __clone() : Appelés lorsque l'on essaie de cloner l'objet


//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//exemple de variable par référence
public function truc()
  {
      //
      $var = 'toto';
      // toto
      $this->product(null, $var);
      // tata
  }

  /**
   * @param int $id
   * @param string $name
   * @return Product
   */
  public function product(int $id = null, string &$name) //&$name est une variable par référence
  {
      $p = new Product();
      $name = 'tata'; //variable utilisable si non modifiée lors de l'utilisation de la méthode
      return $p;
  }