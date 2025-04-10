#include <iostream>
using namespace std;

class Car {
public:
    string color;
    string make;
    string model;

    void startEngine() {
        cout << "Engine started!" << endl;
    }

    void accelerate() {
        cout << "Car is accelerating!" << endl;
    }
};
int add(int a, int b) {
        cout << "Engine started!" << endl;
        cou<<a+b;
    }

int main() {
    Car myCar; // Creating an object of the Car class

    // Setting the attributes of the object
    myCar.color = "Red";
    myCar.make = "Toyota";
    myCar.model = "Camry";

    // Calling the functions of the object
    myCar.startEngine();
    myCar.accelerate();


    int x=10, y=15;
    int startEngine(int x, int y);
    return 0;
}
