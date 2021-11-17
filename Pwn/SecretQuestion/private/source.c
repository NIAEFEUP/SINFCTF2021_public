// gcc -Wall -fno-stack-protector source.c -o SecretQuestion
#include <stdio.h>
#include <stdlib.h>

__attribute__((constructor))
void setup() {
    setvbuf(stdout, 0, 2, 0);
    setvbuf(stdin, 0, 2, 0);
}

int main() {
    long val = 0x01234567;
    char buffer[64];

    printf("SIMITARRA\n");
    printf("To access the secret you need to answer the security question.\n");
    printf("What is the best operating system?\n");
    fflush(stdout);

    gets(&buffer);

    if(val != 0x01234567) {
        system("cat flag.txt");
    } else {
        printf("You thought I would give the secret to you... you fool!\n");
    }
    
    return 0;
}