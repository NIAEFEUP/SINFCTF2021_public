#include <stdio.h>
#include <termios.h>
#include <string.h>
#include <unistd.h>

const char success[] = " __  __     ______     ______     __  __     ______     ______     __    __     ______     __   __    \n/\\ \\_\\ \\   /\\  __ \\   /\\  ___\\   /\\ \\/ /    /\\  ___\\   /\\  == \\   /\\ \"-./  \\   /\\  __ \\   /\\ \"-.\\ \\   \n\\ \\  __ \\  \\ \\  __ \\  \\ \\ \\____  \\ \\  _\"-.  \\ \\  __\\   \\ \\  __<   \\ \\ \\-./\\ \\  \\ \\  __ \\  \\ \\ \\-.  \\  \n \\ \\_\\ \\_\\  \\ \\_\\ \\_\\  \\ \\_____\\  \\ \\_\\ \\_\\  \\ \\_____\\  \\ \\_\\ \\_\\  \\ \\_\\ \\ \\_\\  \\ \\_\\ \\_\\  \\ \\_\\\\\"\\_\\ \n  \\/_/\\/_/   \\/_/\\/_/   \\/_____/   \\/_/\\/_/   \\/_____/   \\/_/ /_/   \\/_/  \\/_/   \\/_/\\/_/   \\/_/ \\/_/ \n                                                                                                      ";

const char flag[] = "SINFCTF2021{n3v3r_h4rdc0de_p4ssw0rds}";

int main() {
  printf("Welcome to SIMITARRA! Please insert your password: ");
  char password[256];

  static struct termios oldt, newt;
    // saving the old settings of STDIN_FILENO and copy settings for resetting
    tcgetattr(STDIN_FILENO, &oldt);
    newt = oldt;

    // setting the approriate bit in the termios struct
    newt.c_lflag &= ~(ECHO);          

    // setting the new bits*
    tcsetattr(STDIN_FILENO, TCSANOW, &newt);

  while (1) {
    fgets(password, sizeof(password), stdin);

    const int len = strlen(password);
    if (len > 0 && password[len - 1] == '\n')
      password[len-1] = '\0';

    if (strcmp(password, flag) == 0) break;
    printf("\nWrong password! Please try again: ");
  }

  printf("\n%s\n", success);

  // resetting our old STDIN_FILENO
  tcsetattr( STDIN_FILENO, TCSANOW, &oldt);
  return 0;
}
