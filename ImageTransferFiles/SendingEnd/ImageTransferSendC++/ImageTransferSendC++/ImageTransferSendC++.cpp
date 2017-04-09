// ImageTransferSendC++.cpp : Defines the entry point for the console application.
//

#include "stdafx.h"
#include "iostream"

using namespace std;

int jpeg[3][3];
int single[9];

int main()
{
	int i;
	int j;
	int count = 1;
	
	for (i = 0; i < 3; i++)
	{
		for (j = 0; j < 3; j++)
		{
			jpeg[i][j] = count++;
		}
	}

	int k = 0;


	for (i = 0; i < 3; i++)
	{
		for (j = 0; j < 3; j++)
		{
			single[i * 3 + j] = jpeg[i][j];
		}
	}

	for (k = 0; k < 9; k++)
	{
		cout << "Value in Single: " << single[k] << endl;
	}


    return 0;
}

