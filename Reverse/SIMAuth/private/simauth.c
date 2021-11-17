#include <stdio.h>
#include <stdlib.h>
#include <string.h>

__attribute__((constructor))
void setup() {
  setvbuf(stdout, 0, 2, 0);
  setvbuf(stdin, 0, 2, 0);
}

void printFlag() {
  FILE* sol = fopen("flag.txt", "r");
  char c;
  if (sol == NULL) return;

  while ((c = getc(sol)) != EOF) {
    putchar(c);
  }
  fclose(sol);
}

int validatePassword(char* pass) {
  int soma = 0;
  for (int i = 0; i < strlen(pass); ++i)
    soma += pass[i];

  if (soma == 0) return 0;

  if (soma % 109 == 0 && soma % 327 == 0) return 1;
  return 0;
}

int main() {
  printf("Please insert the password: ");
  char password[256];

  fgets(password, sizeof(password), stdin);

  const int len = strlen(password);
  if (len > 0 && password[len - 1] == '\n')
    password[len-1] = '\0';

  if (validatePassword(password)) printFlag();
  else printf("Wrong password!\n");

  return 0;
}
