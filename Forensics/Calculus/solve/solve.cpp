#include <iostream>
#include <fstream>
#include <string>
#include <math.h>

using namespace std;

int main() {
  ifstream file;
  file.open("flag.txt");

  string text;
  file >> text;

  int i = 0, n = 1;
  char c;

  while (c != '}') {
    i += pow(n++, 2);
    c = text.at(i - 1);
    cout << c;
  }
  cout << endl;

  return 0;
}
